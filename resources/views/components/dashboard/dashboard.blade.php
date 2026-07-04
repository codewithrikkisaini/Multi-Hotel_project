<div>
    {{-- Header --}}
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-black text-gray-900 tracking-tight">Dashboard</h1>
            <p class="text-sm text-gray-500 mt-0.5">Welcome back, {{ Auth::user()->name ?? 'Admin' }}. Here's what's happening today.</p>
        </div>
        <a href="{{ route('reservations.create') }}" class="btn-primary btn-sm rounded-lg shadow-sm">
            <i class="fas fa-plus text-xs"></i> New Booking
        </a>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="stat-card">
            <div class="stat-icon bg-indigo-50 text-indigo-600">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-900">{{ $checkInsToday ?? 0 }}</p>
                <p class="text-xs font-semibold text-gray-500">Arrivals Today</p>
            </div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon bg-emerald-50 text-emerald-600">
                <i class="fas fa-sign-out-alt"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-900">{{ $checkOutsToday ?? 0 }}</p>
                <p class="text-xs font-semibold text-gray-500">Departures Today</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-red-50 text-red-600">
                <i class="fas fa-bed"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-900">{{ $occupiedRooms ?? 0 }}</p>
                <p class="text-xs font-semibold text-gray-500">Occupied Rooms</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon bg-amber-50 text-amber-600">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div>
                <p class="text-2xl font-black text-gray-900">${{ number_format($revenueToday ?? 0, 2) }}</p>
                <p class="text-xs font-semibold text-gray-500">Revenue Today</p>
            </div>
        </div>
    </div>

    {{-- Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 pms-card">
            <div class="pms-card-header">
                <h3 class="text-sm font-bold text-gray-800">Recent Reservations</h3>
                <a href="{{ route('reservations.index') }}" class="text-xs text-indigo-600 font-semibold hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="pms-table">
                    <thead>
                        <tr>
                            <th>Guest</th>
                            <th>Dates</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentReservations ?? [] as $res)
                        <tr>
                            <td>
                                <span class="font-bold text-gray-800 text-sm block">{{ $res->guest->name ?? 'N/A' }}</span>
                            </td>
                            <td>
                                <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($res->check_in_date)->format('d M') }} - {{ \Carbon\Carbon::parse($res->check_out_date)->format('d M') }}</span>
                            </td>
                            <td>
                                <span class="badge-{{ strtolower(str_replace('-', '', $res->status ?? 'confirmed')) }}">
                                    {{ $res->status ?? 'Confirmed' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="py-8 text-center text-gray-400">
                                <p class="text-sm">No recent activity found.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="pms-card">
            <div class="pms-card-header">
                <h3 class="text-sm font-bold text-gray-800">Quick Actions</h3>
            </div>
            <div class="p-4 space-y-3">
                <a href="{{ route('rooms.create') }}" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 rounded-lg bg-indigo-50 text-indigo-600 flex items-center justify-center">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Add Room</p>
                        <p class="text-xs text-gray-500">Configure new inventory</p>
                    </div>
                </a>
                <a href="{{ route('guests.index') }}" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Guest Directory</p>
                        <p class="text-xs text-gray-500">View guest profiles</p>
                    </div>
                </a>
                <a href="{{ route('reports.daily') }}" class="flex items-center gap-3 p-3 rounded-xl border border-gray-100 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Daily Report</p>
                        <p class="text-xs text-gray-500">View analytics</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
