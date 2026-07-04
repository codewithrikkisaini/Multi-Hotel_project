<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PublicBookingEngine extends Component
{
    public $hotelName = 'Buzen Suites';
    public $checkIn;
    public $checkOut;
    public $adults = 2;
    public $children = 0;
    public $roomsRequired = 1;

    public $availableRoomsByTypes = [];
    public $selectedQuantities = [];
    public $nights = 1;

    public $step = 1;
    public $guestName = '';
    public $guestEmail = '';
    public $guestPhone = '';

    public function mount()
    {
        $this->checkIn = now()->addDays(2)->format('Y-m-d');
        $this->checkOut = now()->addDays(5)->format('Y-m-d');
        $this->searchAvailability();
    }

    public function searchAvailability()
    {
        $checkInDate = Carbon::parse($this->checkIn);
        $checkOutDate = Carbon::parse($this->checkOut);
        
        if ($checkOutDate->lte($checkInDate)) {
            $this->addError('checkOut', 'Check-out must be after check-in.');
            $this->availableRoomsByTypes = [];
            return;
        }

        $this->nights = $checkInDate->diffInDays($checkOutDate);

        // Fetch all room types
        $roomTypes = RoomType::all();
        $this->availableRoomsByTypes = [];

        foreach ($roomTypes as $rt) {
            $availableRooms = Room::where('room_type_id', $rt->id)
                ->availableBetween($this->checkIn, $this->checkOut)
                ->get();

            if ($availableRooms->count() > 0) {
                $price = $availableRooms->first()->price;
                
                $this->availableRoomsByTypes[] = [
                    'id' => $rt->id,
                    'name' => $rt->name,
                    'available_count' => $availableRooms->count(),
                    'price_per_night' => $price,
                    'total_price' => $price * $this->nights,
                    'room_ids' => $availableRooms->pluck('id')->toArray(),
                ];
                
                if (!isset($this->selectedQuantities[$rt->id])) {
                    $this->selectedQuantities[$rt->id] = 0;
                }
            }
        }
    }

    public function initiateBooking()
    {
        $totalRoomsSelected = array_sum($this->selectedQuantities);
        
        if ($totalRoomsSelected == 0) {
            $this->addError('selection', 'Please select at least one room.');
            return;
        }

        $this->step = 2; // Move to guest details form
    }

    public function goBack()
    {
        $this->step = 1;
    }

    public function confirmBooking()
    {
        $this->validate([
            'guestName' => 'required|string|max:255',
            'guestEmail' => 'required|email',
            'guestPhone' => 'required|string',
        ]);

        DB::transaction(function () {
            // Find or create guest
            $guest = Guest::firstOrCreate(
                ['email' => $this->guestEmail],
                ['name' => $this->guestName, 'phone' => $this->guestPhone]
            );

            // Fetch any hotel id (or default to 1 if not strictly multi-tenant mapped for public)
            $hotelId = DB::table('hotels')->first()->id ?? 1;

            // Create reservation
            $reservation = Reservation::create([
                'guest_id' => $guest->id,
                'check_in_date' => $this->checkIn,
                'check_out_date' => $this->checkOut,
                'status' => 'Confirmed',
                'hotel_id' => $hotelId
            ]);

            // Assign rooms
            foreach ($this->availableRoomsByTypes as $type) {
                $qty = $this->selectedQuantities[$type['id']] ?? 0;
                if ($qty > 0) {
                    $roomIdsToAssign = array_slice($type['room_ids'], 0, $qty);
                    foreach($roomIdsToAssign as $rId) {
                        $reservation->rooms()->attach($rId, ['price' => $type['price_per_night']]);
                    }
                }
            }
        });

        $this->step = 3; // Success state
    }

    public function render()
    {
        return view('livewire.public-booking-engine')
            ->layout('layouts.blank');
    }
}
