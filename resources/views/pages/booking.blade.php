<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Your Stay | Merahkie Reservations</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-100 font-sans antialiased text-slate-800">

{{-- Booking.com inspired Top Nav --}}
<header class="bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="text-xl font-black tracking-tight">Merahkie<span class="text-blue-300">Stays</span></span>
        </div>
        <div class="flex items-center gap-4 text-sm font-bold">
            <button class="hover:bg-blue-800 px-3 py-1.5 rounded transition-colors"><i class="fas fa-globe mr-1"></i> EN</button>
            <button class="hover:bg-blue-800 px-3 py-1.5 rounded transition-colors">USD</button>
            <button class="bg-white text-blue-900 hover:bg-slate-100 px-4 py-1.5 rounded transition-colors shadow-sm ml-2">Sign in</button>
        </div>
    </div>
    
    {{-- Search Banner Area --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 pb-16">
        <h1 class="text-4xl sm:text-5xl font-black mb-2">Find your next stay</h1>
        <p class="text-xl text-blue-100 font-medium">Search low prices on hotels, homes and much more...</p>
    </div>
</header>

{{-- The iconic Search Bar (floating) --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative -mt-8 z-20">
    <div class="bg-amber-400 p-1 rounded-xl shadow-xl flex flex-col md:flex-row gap-1">
        
        <div class="flex-1 flex bg-white rounded-lg relative overflow-hidden items-center px-4 py-3 cursor-text">
            <i class="fas fa-bed text-slate-400 text-lg mr-3"></i>
            <div class="flex-1">
                <input type="text" value="Buzen Suites & Resort" readonly class="w-full bg-transparent border-none p-0 text-slate-900 font-bold focus:ring-0 cursor-pointer">
            </div>
        </div>
        
        <div class="flex-1 flex bg-white rounded-lg relative overflow-hidden items-center px-4 py-3 cursor-pointer">
            <i class="far fa-calendar-alt text-slate-400 text-lg mr-3"></i>
            <div class="flex-1">
                <span class="text-slate-900 font-bold block">{{ now()->addDays(2)->format('D, M d') }} &mdash; {{ now()->addDays(5)->format('D, M d') }}</span>
            </div>
        </div>
        
        <div class="flex-1 flex bg-white rounded-lg relative overflow-hidden items-center px-4 py-3 cursor-pointer">
            <i class="fas fa-user text-slate-400 text-lg mr-3"></i>
            <div class="flex-1 text-slate-900 font-bold">
                2 adults &middot; 0 children &middot; 1 room
            </div>
            <i class="fas fa-chevron-down text-slate-400 text-sm ml-auto"></i>
        </div>
        
        <button class="bg-blue-800 hover:bg-blue-900 text-white font-black text-lg py-3 px-8 rounded-lg shadow-sm transition-colors w-full md:w-auto">
            Search
        </button>
    </div>
</div>

{{-- Main Content --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex flex-col lg:flex-row gap-8">
    
    {{-- Left Sidebar --}}
    <div class="w-full lg:w-1/4 space-y-4">
        {{-- Map Placeholder --}}
        <div class="bg-slate-200 rounded-xl h-36 flex items-center justify-center relative overflow-hidden border border-slate-300 cursor-pointer group">
            <div class="absolute inset-0 bg-cover bg-center opacity-50" style="background-image: url('https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80')"></div>
            <button class="relative z-10 bg-blue-800 text-white font-bold px-4 py-2 rounded shadow-md group-hover:bg-blue-900 transition-colors text-sm">
                <i class="fas fa-map-marker-alt mr-1.5"></i> Show on map
            </button>
        </div>
        
        {{-- Filters (Dummy) --}}
        <div class="bg-white rounded-xl border border-slate-200 p-4 shadow-sm">
            <h3 class="font-black text-slate-900 mb-3 text-sm">Filter by:</h3>
            
            <div class="border-t border-slate-100 py-3">
                <h4 class="font-bold text-slate-800 mb-2 text-xs">Popular filters</h4>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 text-blue-800 rounded border-slate-300">
                        <span class="text-sm text-slate-700">Breakfast included</span>
                        <span class="ml-auto text-xs text-slate-400">12</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 text-blue-800 rounded border-slate-300">
                        <span class="text-sm text-slate-700">Pool</span>
                        <span class="ml-auto text-xs text-slate-400">5</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4 text-blue-800 rounded border-slate-300">
                        <span class="text-sm text-slate-700">Free cancellation</span>
                        <span class="ml-auto text-xs text-slate-400">18</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Right Content List --}}
    <div class="w-full lg:w-3/4 space-y-5">
        
        <h2 class="text-xl font-bold text-slate-900 mb-2">Available Rooms at Buzen Suites</h2>
        
        {{-- Room Card 1 --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col sm:flex-row hover:shadow-md transition-shadow">
            <div class="w-full sm:w-1/3 h-48 sm:h-auto bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
                <div class="absolute top-2 left-2 bg-emerald-500 text-white text-[10px] font-black uppercase px-2 py-1 rounded shadow-sm tracking-widest">
                    Best Seller
                </div>
            </div>
            
            <div class="w-full sm:w-2/3 p-4 flex flex-col">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-lg font-black text-blue-800 hover:underline cursor-pointer">Deluxe Ocean View Room</h3>
                    <div class="flex items-center gap-1 bg-blue-800 text-white font-bold px-2 py-1 rounded-md text-sm">
                        8.9 <div class="text-[10px] font-normal">Fab</div>
                    </div>
                </div>
                
                <p class="text-xs text-slate-500 mb-3"><i class="fas fa-bed mr-1 text-slate-400"></i> 1 extra-large double bed &middot; 35m²</p>
                
                <div class="flex flex-wrap gap-1.5 mb-4 text-xs font-bold text-emerald-700">
                    <span class="bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100"><i class="fas fa-check mr-1"></i> Free cancellation</span>
                    <span class="bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100"><i class="fas fa-check mr-1"></i> No prepayment</span>
                </div>
                
                <div class="mt-auto flex flex-col items-end border-t border-slate-100 pt-3">
                    <span class="text-xs text-slate-500 font-medium line-through mb-0.5">US$290</span>
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-black text-slate-900">US$249</span>
                    </div>
                    <span class="text-[10px] text-slate-500 mb-3">+US$49 taxes and charges</span>
                    
                    <button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded shadow-md transition-colors w-full sm:w-auto">
                        See availability <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Room Card 2 --}}
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden flex flex-col sm:flex-row hover:shadow-md transition-shadow">
            <div class="w-full sm:w-1/3 h-48 sm:h-auto bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1582719508461-905c673771fd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80')">
            </div>
            
            <div class="w-full sm:w-2/3 p-4 flex flex-col">
                <div class="flex justify-between items-start mb-1">
                    <h3 class="text-lg font-black text-blue-800 hover:underline cursor-pointer">Standard Double Room</h3>
                    <div class="flex items-center gap-1 bg-blue-800 text-white font-bold px-2 py-1 rounded-md text-sm">
                        8.5 <div class="text-[10px] font-normal">Very Good</div>
                    </div>
                </div>
                
                <p class="text-xs text-slate-500 mb-3"><i class="fas fa-bed mr-1 text-slate-400"></i> 1 double bed &middot; 22m²</p>
                
                <div class="flex flex-wrap gap-1.5 mb-4 text-xs font-bold text-slate-700">
                    <span class="bg-slate-50 px-1.5 py-0.5 rounded border border-slate-200">Non-refundable</span>
                    <span class="bg-emerald-50 px-1.5 py-0.5 rounded border border-emerald-100 text-emerald-700"><i class="fas fa-coffee mr-1"></i> Breakfast included</span>
                </div>
                
                <div class="mt-auto flex flex-col items-end border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-black text-slate-900">US$159</span>
                    </div>
                    <span class="text-[10px] text-slate-500 mb-3">+US$29 taxes and charges</span>
                    
                    <button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-6 rounded shadow-md transition-colors w-full sm:w-auto">
                        See availability <i class="fas fa-chevron-right ml-1 text-xs"></i>
                    </button>
                </div>
            </div>
        </div>
        
    </div>
</div>

<footer class="bg-blue-950 text-white py-12 mt-10">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-blue-300 text-sm font-medium">&copy; {{ date('Y') }} Merahkie Cloud PMS. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
