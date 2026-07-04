<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Reservation;

class CalendarController extends Controller
{
    public function getCalendarData(Request $request)
    {
        $startDate = $request->query('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->query('end_date', now()->endOfMonth()->toDateString());

        // Get rooms with their reservations in the given date range
        $rooms = Room::with(['reservations' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('check_in_date', [$startDate, $endDate])
                  ->orWhereBetween('check_out_date', [$startDate, $endDate])
                  ->with('guest');
        }])->get();

        $calendarData = $rooms->map(function ($room) {
            return [
                'room_id' => $room->id,
                'room_number' => $room->room_number,
                'room_type' => $room->roomType->name ?? 'N/A',
                'reservations' => $room->reservations->map(function ($res) {
                    return [
                        'reservation_id' => $res->id,
                        'guest_name' => $res->guest->first_name . ' ' . $res->guest->last_name,
                        'check_in' => $res->check_in_date,
                        'check_out' => $res->check_out_date,
                        'status' => $res->status
                    ];
                })
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $calendarData
        ]);
    }
}
