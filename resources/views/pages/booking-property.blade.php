<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buzen Suites - Guest Reservations</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f5f5f5; color: #1a1a1a; }
        .b-blue { background-color: #003b95; }
        .b-text-blue { color: #0071c2; }
        .b-yellow { background-color: #ffb700; }
        .b-btn-blue { background-color: #0071c2; }
        .b-btn-blue:hover { background-color: #005eb8; }
    </style>
</head>
<body class="antialiased">

{{-- Header Nav --}}
<header class="b-blue text-white">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <div class="text-2xl font-black tracking-tight cursor-pointer">Merahkie<span class="text-blue-300">.com</span></div>
        <div class="flex items-center gap-5 font-bold text-sm">
            <span class="hidden sm:inline hover:bg-blue-800 px-2 py-1 rounded cursor-pointer">INR</span>
            <img src="https://flagcdn.com/w20/in.png" alt="India" class="w-5 hidden sm:inline cursor-pointer">
            <i class="far fa-question-circle text-lg hidden sm:inline cursor-pointer"></i>
            <span class="hidden sm:inline hover:bg-blue-800 px-2 py-1 rounded cursor-pointer">List your property</span>
            <button class="bg-white text-blue-900 px-4 py-1.5 rounded hover:bg-slate-100 transition shadow-sm">Register</button>
            <button class="bg-white text-blue-900 px-4 py-1.5 rounded hover:bg-slate-100 transition shadow-sm">Sign in</button>
        </div>
    </div>
    <div class="max-w-6xl mx-auto px-4 pb-4 hidden md:flex gap-4 text-sm font-bold mt-2">
        <a href="#" class="border-white border rounded-full px-4 py-2 bg-blue-800"><i class="fas fa-bed mr-2"></i>Stays</a>
        <a href="#" class="px-4 py-2 hover:bg-blue-800 rounded-full transition"><i class="fas fa-plane mr-2"></i>Flights</a>
        <a href="#" class="px-4 py-2 hover:bg-blue-800 rounded-full transition"><i class="fas fa-car mr-2"></i>Car rentals</a>
        <a href="#" class="px-4 py-2 hover:bg-blue-800 rounded-full transition"><i class="fas fa-torii-gate mr-2"></i>Attractions</a>
        <a href="#" class="px-4 py-2 hover:bg-blue-800 rounded-full transition"><i class="fas fa-taxi mr-2"></i>Airport taxis</a>
    </div>
</header>

{{-- Main Search Bar --}}
<div class="bg-slate-100 border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 -mt-7 relative z-10 hidden md:block">
        <div class="b-yellow p-1 rounded-lg shadow-md flex items-center gap-1">
            <div class="flex-1 bg-white p-3 rounded flex items-center gap-2 cursor-text">
                <i class="fas fa-bed text-slate-500"></i>
                <input type="text" value="Buzen Suites" class="border-none p-0 w-full font-bold focus:ring-0 text-slate-900" readonly>
            </div>
            <div class="flex-1 bg-white p-3 rounded flex items-center gap-2 cursor-pointer border-l-4 border-yellow-400">
                <i class="far fa-calendar-alt text-slate-500"></i>
                <span class="font-bold text-slate-800 whitespace-nowrap">Check-in Date &mdash; Check-out Date</span>
            </div>
            <div class="flex-1 bg-white p-3 rounded flex items-center gap-2 cursor-pointer border-l-4 border-yellow-400">
                <i class="fas fa-user text-slate-500"></i>
                <span class="font-bold text-slate-800 whitespace-nowrap">2 adults &middot; 0 children &middot; 1 room</span>
            </div>
            <button class="b-btn-blue text-white font-bold text-lg px-8 py-3 rounded hover:bg-blue-800 transition">Search</button>
        </div>
    </div>

    {{-- Breadcrumbs & Nav Tabs --}}
    <div class="max-w-6xl mx-auto px-4 mt-6">
        <div class="text-xs text-slate-500 font-medium mb-4">
            <a href="#" class="b-text-blue hover:underline">Home</a> > 
            <a href="#" class="b-text-blue hover:underline">India</a> > 
            <a href="#" class="b-text-blue hover:underline">New Delhi</a> > 
            <a href="#" class="b-text-blue hover:underline">Buzen Suites</a>
        </div>
        <div class="flex gap-6 border-b border-slate-300 text-sm font-bold text-slate-600">
            <a href="#" class="pb-3 border-b-2 b-text-blue border-blue-600" style="color: #0071c2;">Overview</a>
            <a href="#" class="pb-3 hover:text-blue-600 transition">Info & prices</a>
            <a href="#" class="pb-3 hover:text-blue-600 transition">Facilities</a>
            <a href="#" class="pb-3 hover:text-blue-600 transition">House rules</a>
            <a href="#" class="pb-3 hover:text-blue-600 transition">Guest reviews (214)</a>
        </div>
    </div>
</div>

{{-- Content Area --}}
<div class="max-w-6xl mx-auto px-4 py-6 flex flex-col md:flex-row gap-6">

    {{-- Left Sidebar (Search / Map) --}}
    <div class="w-full md:w-1/4 hidden md:block space-y-4">
        {{-- Search Widget --}}
        <div class="bg-yellow-400 p-4 rounded-lg">
            <h3 class="font-bold text-sm mb-3">Search</h3>
            <div class="space-y-3">
                <div class="bg-white p-2 text-sm rounded">
                    <label class="text-xs text-slate-500 font-bold block mb-1">Destination/property name:</label>
                    <div class="flex items-center gap-2"><i class="fas fa-search text-slate-400"></i><input type="text" value="Buzen Suites" class="w-full border-none p-0 focus:ring-0 font-bold text-slate-800" readonly></div>
                </div>
                <div class="bg-white p-2 text-sm rounded cursor-pointer">
                    <label class="text-xs text-slate-500 font-bold block mb-1">Check-in date</label>
                    <div class="flex items-center gap-2 font-bold text-blue-600"><i class="far fa-calendar-alt"></i> {{ now()->addDays(2)->format('D d M Y') }}</div>
                </div>
                <div class="bg-white p-2 text-sm rounded cursor-pointer">
                    <label class="text-xs text-slate-500 font-bold block mb-1">Check-out date</label>
                    <div class="flex items-center gap-2 font-bold text-blue-600"><i class="far fa-calendar-alt"></i> {{ now()->addDays(5)->format('D d M Y') }}</div>
                </div>
                <button class="w-full b-btn-blue text-white font-bold py-3 rounded text-lg">Search</button>
            </div>
        </div>
        
        {{-- Map Widget --}}
        <div class="rounded-lg overflow-hidden relative cursor-pointer group border border-slate-300">
            <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" class="w-full h-36 object-cover opacity-80 group-hover:opacity-100 transition" alt="Map">
            <div class="absolute inset-0 flex items-center justify-center">
                <button class="b-btn-blue text-white font-bold px-4 py-2 rounded text-sm shadow-lg flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Show on map</button>
            </div>
        </div>
    </div>

    {{-- Right Main Content (Hotel Details) --}}
    <div class="w-full md:w-3/4">
        
        {{-- Header & Buttons --}}
        <div class="flex justify-between items-start mb-4">
            <div>
                <div class="flex items-center gap-2 mb-1 text-xs">
                    <span class="bg-slate-500 text-white px-2 py-0.5 rounded-sm font-bold uppercase tracking-wide">Hotel</span>
                    <span class="text-yellow-400 text-sm"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                </div>
                <h1 class="text-3xl font-black text-slate-900 tracking-tight">Buzen Suites</h1>
                <p class="text-sm b-text-blue font-medium mt-1 cursor-pointer hover:underline flex items-start gap-1">
                    <i class="fas fa-map-marker-alt mt-1"></i>
                    103/5 Safdarjung Enclave, Delhi 110029, India &ndash; Excellent location - show map
                </p>
            </div>
            <div class="flex flex-col items-end gap-2">
                <div class="flex gap-2">
                    <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-full transition"><i class="far fa-heart text-xl"></i></button>
                    <button class="text-blue-600 hover:bg-blue-50 p-2 rounded-full transition"><i class="fas fa-share-alt text-xl"></i></button>
                    <button class="b-btn-blue text-white font-bold px-6 py-2 rounded shadow text-sm">Reserve</button>
                </div>
                <div class="flex items-center gap-2 text-emerald-700 bg-emerald-50 px-2 py-1 rounded text-xs font-bold border border-emerald-100">
                    <i class="fas fa-tag"></i> We Price Match
                </div>
            </div>
        </div>

        {{-- Image Gallery --}}
        <div class="grid grid-cols-4 grid-rows-2 gap-1.5 mb-8 rounded-lg overflow-hidden max-h-[400px]">
            <div class="col-span-3 row-span-2 relative cursor-pointer">
                <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Main" class="w-full h-full object-cover">
            </div>
            <div class="col-span-1 row-span-1 cursor-pointer">
                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Room 1" class="w-full h-full object-cover">
            </div>
            <div class="col-span-1 row-span-1 relative cursor-pointer">
                <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Room 2" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white font-bold hover:bg-black/20 transition text-sm">
                    +45 photos
                </div>
            </div>
        </div>

        {{-- Description & Highlights --}}
        <div class="flex flex-col lg:flex-row gap-8 mb-10">
            <div class="w-full lg:w-2/3 text-sm text-slate-700 space-y-4">
                <p>Located in New Delhi, 3.4 km from Lodhi Gardens, Buzen Suites provides accommodation with a restaurant, free private parking, a fitness centre and a garden.</p>
                <p>Among the facilities at this property are a 24-hour front desk and room service, along with free WiFi throughout the property. The hotel features family rooms.</p>
                <p>Guest rooms are equipped with air conditioning, a flat-screen TV with satellite channels, a fridge, a kettle, a shower, a hairdryer and a desk. At the hotel each room has a wardrobe and a private bathroom.</p>
                <p>Guests at Buzen Suites can enjoy a continental or a buffet breakfast.</p>
                <h4 class="font-bold text-slate-900 mt-6 mb-2">Most popular facilities</h4>
                <div class="flex flex-wrap gap-4 text-emerald-700 font-bold">
                    <span class="flex items-center gap-1.5"><i class="fas fa-parking text-lg"></i> Free parking</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-wifi text-lg"></i> Free WiFi</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-shuttle-van text-lg"></i> Airport shuttle</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-smoking-ban text-lg"></i> Non-smoking rooms</span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-dumbbell text-lg"></i> Fitness centre</span>
                </div>
            </div>

            <div class="w-full lg:w-1/3">
                <div class="bg-blue-50 border border-blue-200 p-4 rounded-lg">
                    <h3 class="font-bold text-slate-900 mb-2">Property Highlights</h3>
                    <p class="text-xs font-bold text-slate-700 mb-2">Perfect for a 3-night stay!</p>
                    <p class="text-xs text-slate-600 mb-4"><i class="fas fa-map-marker-alt text-slate-400 mr-1"></i> Situated in the best rated area in New Delhi, this hotel has an excellent location score of 9.2</p>
                    
                    <h4 class="text-xs font-bold text-slate-900 mb-2">Breakfast Info</h4>
                    <p class="text-xs text-slate-600 mb-4">Continental, Vegetarian, Halal, Buffet</p>

                    <h4 class="text-xs font-bold text-slate-900 mb-2">Rooms with:</h4>
                    <ul class="text-xs text-slate-600 mb-4 space-y-1">
                        <li><i class="fas fa-city w-4"></i> City view</li>
                        <li><i class="fas fa-tree w-4"></i> Garden view</li>
                        <li><i class="fas fa-swimming-pool w-4"></i> Pool view</li>
                    </ul>

                    <button class="w-full b-btn-blue text-white font-bold py-2 rounded text-sm shadow">Reserve</button>
                </div>
            </div>
        </div>

        {{-- Availability Section --}}
        <div class="mb-10" id="availability">
            <h2 class="text-2xl font-black text-slate-900 mb-4">Availability</h2>
            
            {{-- Room Table --}}
            <div class="border border-slate-300 rounded overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="b-blue text-white font-bold">
                        <tr>
                            <th class="p-3 border-r border-slate-500 w-1/3">Room Type</th>
                            <th class="p-3 border-r border-slate-500 text-center w-1/6">Sleeps</th>
                            <th class="p-3 border-r border-slate-500 w-1/4">Price for 3 nights</th>
                            <th class="p-3 text-center">Select Rooms</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-300 bg-white">
                        
                        {{-- Room row 1 --}}
                        <tr>
                            <td class="p-4 border-r border-slate-300">
                                <a href="#" class="font-bold b-text-blue hover:underline text-base block mb-2">Deluxe Double Room with Balcony</a>
                                <p class="text-xs text-slate-600 mb-2">1 extra-large double bed</p>
                                <div class="text-xs font-bold text-emerald-700 flex flex-col gap-1">
                                    <span><i class="fas fa-mug-hot"></i> Free breakfast</span>
                                    <span><i class="fas fa-check"></i> Free cancellation before {{ now()->addDays(1)->format('d M') }}</span>
                                    <span><i class="fas fa-check"></i> No prepayment needed</span>
                                </div>
                            </td>
                            <td class="p-4 border-r border-slate-300 text-center text-slate-600">
                                <i class="fas fa-user"></i><i class="fas fa-user"></i>
                            </td>
                            <td class="p-4 border-r border-slate-300">
                                <div class="text-xl font-bold text-slate-900">₹ 14,500</div>
                                <div class="text-xs text-slate-500">+₹ 1,740 taxes and charges</div>
                            </td>
                            <td class="p-4 text-center align-middle">
                                <select class="border border-slate-400 rounded p-1 mb-3 bg-slate-50">
                                    <option>0</option>
                                    <option>1 (₹ 14,500)</option>
                                    <option>2 (₹ 29,000)</option>
                                </select>
                                <button class="b-btn-blue text-white font-bold w-full py-2 rounded text-sm shadow">I'll reserve</button>
                                <ul class="text-left text-[10px] text-slate-500 mt-2 list-disc pl-4 space-y-0.5">
                                    <li>Confirmation is immediate</li>
                                    <li>No booking fees</li>
                                </ul>
                            </td>
                        </tr>

                        {{-- Room row 2 --}}
                        <tr>
                            <td class="p-4 border-r border-slate-300 bg-blue-50/30">
                                <a href="#" class="font-bold b-text-blue hover:underline text-base block mb-2">Standard Twin Room</a>
                                <p class="text-xs text-slate-600 mb-2">2 single beds</p>
                                <div class="text-xs font-bold text-red-600 flex flex-col gap-1">
                                    <span>Non-refundable</span>
                                </div>
                            </td>
                            <td class="p-4 border-r border-slate-300 text-center text-slate-600 bg-blue-50/30">
                                <i class="fas fa-user"></i><i class="fas fa-user"></i>
                            </td>
                            <td class="p-4 border-r border-slate-300 bg-blue-50/30">
                                <div class="text-xs line-through text-red-500 font-bold">₹ 12,000</div>
                                <div class="text-xl font-bold text-slate-900">₹ 9,500</div>
                                <div class="text-xs text-slate-500">+₹ 1,140 taxes and charges</div>
                                <span class="bg-red-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded mt-1 inline-block">Early Booker Deal</span>
                            </td>
                            <td class="p-4 text-center align-middle bg-blue-50/30">
                                <select class="border border-slate-400 rounded p-1 mb-3 bg-slate-50">
                                    <option>0</option>
                                    <option>1 (₹ 9,500)</option>
                                </select>
                                <button class="b-btn-blue text-white font-bold w-full py-2 rounded text-sm shadow">I'll reserve</button>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<footer class="b-blue text-white py-12 mt-10">
    <div class="max-w-6xl mx-auto px-4 text-center">
        <p class="text-blue-200 text-sm font-medium">&copy; {{ date('Y') }} Merahkie Cloud PMS. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
