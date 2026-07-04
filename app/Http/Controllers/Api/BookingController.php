<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BookingService;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'room_type_id' => 'required|exists:room_types,id',
        ]);

        $availableRooms = $this->bookingService->checkAvailability(
            $request->check_in,
            $request->check_out,
            $request->room_type_id
        );

        return response()->json([
            'success' => true,
            'available_rooms' => $availableRooms
        ]);
    }

    public function createBooking(BookingRequest $request)
    {
        try {
            $reservation = $this->bookingService->createBooking($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Booking created successfully.',
                'data' => $reservation
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function cancelBooking($id)
    {
        try {
            $this->bookingService->cancelBooking($id);

            return response()->json([
                'success' => true,
                'message' => 'Booking cancelled successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
