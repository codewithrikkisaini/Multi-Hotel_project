<div>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f5f5f5; color: #1a1a1a; }
        .b-blue { background-color: #003b95; }
        .b-text-blue { color: #0071c2; }
        .b-yellow { background-color: #ffb700; }
        .b-btn-blue { background-color: #0071c2; }
        .b-btn-blue:hover { background-color: #005eb8; }
    </style>

    {{-- Header Nav --}}
    <header class="b-blue text-white">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="text-2xl font-black tracking-tight cursor-pointer">Merahkie<span class="text-blue-300">.com</span></div>
            <div class="flex items-center gap-5 font-bold text-sm">
                <span class="hidden sm:inline hover:bg-blue-800 px-2 py-1 rounded cursor-pointer">INR</span>
                <span class="hidden sm:inline hover:bg-blue-800 px-2 py-1 rounded cursor-pointer">List your property</span>
                <a href="{{ route('login') }}" class="bg-white text-blue-900 px-4 py-1.5 rounded hover:bg-slate-100 transition shadow-sm">Sign in</a>
            </div>
        </div>
    </header>

    @if($step == 1)
    {{-- Main Search Bar --}}
    <div class="bg-slate-100 border-b border-slate-200 pb-6">
        <div class="max-w-6xl mx-auto px-4 -mt-7 relative z-10 hidden md:block">
            <div class="b-yellow p-1 rounded-lg shadow-md flex items-center gap-1">
                <div class="flex-1 bg-white p-3 rounded flex items-center gap-2 cursor-text">
                    <i class="fas fa-bed text-slate-500"></i>
                    <input type="text" value="{{ $hotelName }}" class="border-none p-0 w-full font-bold focus:ring-0 text-slate-900" readonly>
                </div>
                <div class="flex-1 bg-white p-3 rounded flex items-center gap-2 cursor-pointer border-l-4 border-yellow-400">
                    <i class="far fa-calendar-alt text-slate-500"></i>
                    <div class="flex items-center gap-2 w-full">
                        <input type="date" wire:model.defer="checkIn" class="border-none p-0 w-full font-bold focus:ring-0 text-slate-900 bg-transparent text-sm">
                        <span class="font-bold text-slate-500">&mdash;</span>
                        <input type="date" wire:model.defer="checkOut" class="border-none p-0 w-full font-bold focus:ring-0 text-slate-900 bg-transparent text-sm">
                    </div>
                </div>
                <button wire:click="searchAvailability" class="b-btn-blue text-white font-bold text-lg px-8 py-3 rounded hover:bg-blue-800 transition">Search</button>
            </div>
            @error('checkOut') <span class="text-red-500 text-xs font-bold mt-1 bg-red-100 px-2 py-1 rounded inline-block">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- Content Area --}}
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row gap-6">

        {{-- Left Sidebar --}}
        <div class="w-full md:w-1/4 hidden md:block space-y-4">
            <div class="bg-yellow-400 p-4 rounded-lg">
                <h3 class="font-bold text-sm mb-3">Search</h3>
                <div class="space-y-3">
                    <div class="bg-white p-2 text-sm rounded">
                        <label class="text-xs text-slate-500 font-bold block mb-1">Destination/property name:</label>
                        <div class="flex items-center gap-2"><i class="fas fa-search text-slate-400"></i><input type="text" value="{{ $hotelName }}" class="w-full border-none p-0 focus:ring-0 font-bold text-slate-800" readonly></div>
                    </div>
                    <div class="bg-white p-2 text-sm rounded cursor-pointer">
                        <label class="text-xs text-slate-500 font-bold block mb-1">Check-in date</label>
                        <input type="date" wire:model.defer="checkIn" class="w-full border-none p-0 focus:ring-0 font-bold text-blue-600 bg-transparent">
                    </div>
                    <div class="bg-white p-2 text-sm rounded cursor-pointer">
                        <label class="text-xs text-slate-500 font-bold block mb-1">Check-out date</label>
                        <input type="date" wire:model.defer="checkOut" class="w-full border-none p-0 focus:ring-0 font-bold text-blue-600 bg-transparent">
                    </div>
                    <button wire:click="searchAvailability" class="w-full b-btn-blue text-white font-bold py-3 rounded text-lg">Search</button>
                </div>
            </div>
            
            <div class="rounded-lg overflow-hidden relative cursor-pointer group border border-slate-300">
                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-36 object-cover opacity-80 group-hover:opacity-100 transition" alt="Map">
                <div class="absolute inset-0 flex items-center justify-center">
                    <button class="b-btn-blue text-white font-bold px-4 py-2 rounded text-sm shadow-lg flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Show on map</button>
                </div>
            </div>
        </div>

        {{-- Right Main Content --}}
        <div class="w-full md:w-3/4">
            
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="flex items-center gap-2 mb-1 text-xs">
                        <span class="bg-slate-500 text-white px-2 py-0.5 rounded-sm font-bold uppercase tracking-wide">Hotel</span>
                        <span class="text-yellow-400 text-sm"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                    </div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">{{ $hotelName }}</h1>
                    <p class="text-sm b-text-blue font-medium mt-1 cursor-pointer hover:underline flex items-start gap-1">
                        <i class="fas fa-map-marker-alt mt-1"></i>
                        103/5 Safdarjung Enclave, Delhi 110029, India &ndash; Excellent location
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-4 grid-rows-2 gap-1.5 mb-8 rounded-lg overflow-hidden max-h-[400px]">
                <div class="col-span-3 row-span-2 relative cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Main" class="w-full h-full object-cover">
                </div>
                <div class="col-span-1 row-span-1 cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Room 1" class="w-full h-full object-cover">
                </div>
                <div class="col-span-1 row-span-1 relative cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Room 2" class="w-full h-full object-cover">
                </div>
            </div>

            {{-- Availability Section --}}
            <div class="mb-10" id="availability">
                <h2 class="text-2xl font-black text-slate-900 mb-4">Availability ({{ $nights }} Nights)</h2>
                
                @if(count($availableRoomsByTypes) > 0)
                    <div class="border border-slate-300 rounded overflow-hidden">
                        <table class="w-full text-sm text-left">
                            <thead class="b-blue text-white font-bold">
                                <tr>
                                    <th class="p-3 border-r border-slate-500 w-1/3">Room Type</th>
                                    <th class="p-3 border-r border-slate-500 text-center w-1/6">Sleeps</th>
                                    <th class="p-3 border-r border-slate-500 w-1/4">Price for {{ $nights }} nights</th>
                                    <th class="p-3 text-center">Select Rooms</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-300 bg-white">
                                @foreach($availableRoomsByTypes as $type)
                                <tr>
                                    <td class="p-4 border-r border-slate-300">
                                        <a href="#" class="font-bold b-text-blue hover:underline text-base block mb-2">{{ $type['name'] }}</a>
                                        <div class="text-xs font-bold text-emerald-700 flex flex-col gap-1 mt-2">
                                            <span><i class="fas fa-mug-hot"></i> Free breakfast included</span>
                                            <span><i class="fas fa-check"></i> Free cancellation</span>
                                        </div>
                                    </td>
                                    <td class="p-4 border-r border-slate-300 text-center text-slate-600">
                                        <i class="fas fa-user"></i><i class="fas fa-user"></i>
                                    </td>
                                    <td class="p-4 border-r border-slate-300">
                                        <div class="text-xl font-black text-slate-900">₹ {{ number_format($type['total_price']) }}</div>
                                        <div class="text-xs text-slate-500 mt-1">₹ {{ number_format($type['price_per_night']) }} / night</div>
                                    </td>
                                    <td class="p-4 text-center align-middle bg-blue-50/10">
                                        <select wire:model.live="selectedQuantities.{{ $type['id'] }}" class="border border-slate-400 rounded p-1.5 mb-3 bg-white shadow-sm font-bold w-24">
                                            @for($i = 0; $i <= $type['available_count']; $i++)
                                                <option value="{{ $i }}">{{ $i }} (₹ {{ number_format($type['total_price'] * $i) }})</option>
                                            @endfor
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4 flex flex-col items-end gap-2">
                        @error('selection') <span class="text-red-600 font-bold text-sm bg-red-100 px-3 py-1 rounded">{{ $message }}</span> @enderror
                        <button wire:click="initiateBooking" class="b-btn-blue text-white font-bold px-8 py-3 rounded text-lg shadow-lg hover:shadow-xl transition-all">I'll reserve</button>
                    </div>
                @else
                    <div class="bg-rose-50 text-rose-700 p-6 rounded-lg border border-rose-200 text-center font-bold">
                        <i class="fas fa-frown text-3xl mb-2 block"></i>
                        No rooms available for the selected dates. Please try different dates.
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endif

    @if($step == 2)
    <div class="max-w-3xl mx-auto px-4 py-10">
        <button wire:click="goBack" class="text-blue-600 font-bold mb-4 hover:underline"><i class="fas fa-arrow-left"></i> Back</button>
        <div class="bg-white p-6 rounded-lg shadow border border-slate-200">
            <h2 class="text-2xl font-black text-slate-900 mb-6">Enter your details</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Full Name</label>
                    <input type="text" wire:model.defer="guestName" class="w-full border border-slate-300 rounded p-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="John Doe">
                    @error('guestName') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Email Address</label>
                    <input type="email" wire:model.defer="guestEmail" class="w-full border border-slate-300 rounded p-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="john@example.com">
                    @error('guestEmail') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Phone Number</label>
                    <input type="text" wire:model.defer="guestPhone" class="w-full border border-slate-300 rounded p-2 focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="+91 9876543210">
                    @error('guestPhone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            
            <div class="mt-8 border-t border-slate-200 pt-6 flex justify-end">
                <button wire:click="confirmBooking" class="b-btn-blue text-white font-bold px-8 py-3 rounded text-lg shadow-lg">Confirm Booking</button>
            </div>
        </div>
    </div>
    @endif

    @if($step == 3)
    <div class="max-w-2xl mx-auto px-4 py-16 text-center">
        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-4xl"></i>
        </div>
        <h2 class="text-3xl font-black text-slate-900 mb-4">Booking Confirmed!</h2>
        <p class="text-slate-600 mb-8">Thank you, {{ $guestName }}. Your reservation at {{ $hotelName }} has been successfully confirmed. We have sent the details to {{ $guestEmail }}.</p>
        <button wire:click="goBack" class="bg-slate-200 text-slate-800 font-bold px-6 py-2 rounded hover:bg-slate-300 transition">Book Another Room</button>
    </div>
    @endif

    <footer class="b-blue text-white py-12 mt-10">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <p class="text-blue-200 text-sm font-medium">&copy; {{ date('Y') }} Merahkie Cloud PMS. All rights reserved.</p>
        </div>
    </footer>
</div>
