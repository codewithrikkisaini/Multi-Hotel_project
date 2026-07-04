<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\Guest;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookingService
{
    public function checkAvailability($checkIn, $checkOut, $roomTypeId)
    {
        // Find rooms of type that are not booked in the given date range
        $bookedRoomIds = Reservation::where(function($query) use ($checkIn, $checkOut) {
            $query->whereBetween('check_in_date', [$checkIn, $checkOut])
                  ->orWhereBetween('check_out_date', [$checkIn, $checkOut]);
        })->where('status', '!=', 'Cancelled')->pluck('room_id');

        return Room::where('room_type_id', $roomTypeId)
                   ->whereNotIn('id', $bookedRoomIds)
                   ->get();
    }

    public function createBooking(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Check Availability
            $availableRooms = $this->checkAvailability($data['check_in_date'], $data['check_out_date'], $data['room_type_id']);
            if ($availableRooms->isEmpty()) {
                throw new \Exception('No rooms available for the selected dates and type.');
            }

            // Create or Find Guest
            $guest = Guest::firstOrCreate(
                ['email' => $data['guest']['email']],
                $data['guest']
            );

            // Generate Booking Number
            $bookingNumber = 'BKG-' . strtoupper(Str::random(8));

            // Calculate Price (Basic example)
            $roomType = RoomType::find($data['room_type_id']);
            $days = \Carbon\Carbon::parse($data['check_in_date'])->diffInDays(\Carbon\Carbon::parse($data['check_out_date']));
            $totalAmount = $roomType->base_price * $days;

            // Store Reservation
            $reservation = Reservation::create([
                'booking_number' => $bookingNumber,
                'guest_id' => $guest->id,
                'room_id' => $availableRooms->first()->id,
                'check_in_date' => $data['check_in_date'],
                'check_out_date' => $data['check_out_date'],
                'total_amount' => $totalAmount,
                'status' => 'Confirmed',
                'hotel_id' => auth()->user()->hotel_id ?? null // Ideally handled by Tenantable Trait
            ]);

            // Send Confirmation Email logic here...

            return $reservation;
        });
    }

    public function cancelBooking($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'Cancelled']);
        
        // Send Cancellation Email logic here...
    }
}
