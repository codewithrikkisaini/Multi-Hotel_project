<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Invoice;

class ReportController extends Controller
{
    public function getReports(Request $request)
    {
        $startDate = $request->query('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->query('end_date', now()->endOfMonth()->toDateString());
        // hotel_id is automatically filtered by Tenantable global scope

        $arrivals = Reservation::whereBetween('check_in_date', [$startDate, $endDate])->get();
        $departures = Reservation::whereBetween('check_out_date', [$startDate, $endDate])->get();
        
        $revenue = Invoice::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->sum('total_amount');
        
        // Mock occupancy calculation logic
        $occupancy = rand(40, 95); 

        return response()->json([
            'success' => true,
            'data' => [
                'revenue' => $revenue,
                'occupancy' => $occupancy . '%',
                'arrivals_count' => $arrivals->count(),
                'departures_count' => $departures->count(),
                'arrivals' => $arrivals,
                'departures' => $departures,
            ]
        ]);
    }
}
