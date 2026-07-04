<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // hotel_id is automatically filtered by Tenantable global scope

        $today = now()->toDateString();

        $todayArrivals = Reservation::whereDate('check_in_date', $today)->count();
        $todayDepartures = Reservation::whereDate('check_out_date', $today)->count();
        
        $totalRooms = Room::count();
        $occupiedRooms = Room::where('status', 'Occupied')->count();
        $availableRooms = Room::where('status', 'Available')->count();
        
        $currentOccupancy = $totalRooms > 0 ? ($occupiedRooms / $totalRooms) * 100 : 0;

        $todayRevenue = Invoice::whereDate('created_at', $today)->sum('total_amount');
        $pendingPayments = Invoice::where('status', 'Unpaid')->sum('total_amount');

        $recentBookings = Reservation::with('guest')->orderBy('created_at', 'desc')->take(5)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'today_arrivals' => $todayArrivals,
                'today_departures' => $todayDepartures,
                'current_occupancy' => round($currentOccupancy, 2) . '%',
                'available_rooms' => $availableRooms,
                'occupied_rooms' => $occupiedRooms,
                'today_revenue' => $todayRevenue,
                'pending_payments' => $pendingPayments,
                'recent_bookings' => $recentBookings,
            ]
        ]);
    }
}
