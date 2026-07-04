<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Your Property | Merahkie Cloud PMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 font-sans antialiased text-slate-800">

{{-- Header --}}
<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-blue-800 rounded-xl flex items-center justify-center shadow-lg shadow-blue-800/20">
                <i class="fas fa-hotel text-white"></i>
            </div>
            <span class="text-slate-900 font-extrabold text-xl tracking-tight">Merahkie <span class="text-emerald-500">Cloud PMS</span></span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-slate-500 font-medium hidden sm:block">Already a partner?</span>
            <a href="{{ route('login') }}" class="text-sm font-bold text-blue-800 hover:text-blue-900 transition-colors">Sign In &rarr;</a>
        </div>
    </div>
</header>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="text-center mb-10">
        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Partner with us</h1>
        <p class="mt-3 text-lg text-slate-500 font-medium">Join thousands of properties worldwide using Merahkie Cloud PMS.</p>
    </div>

    {{-- Stepper UI --}}
    <div class="mb-12">
        <div class="flex items-center justify-between relative">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-200 rounded-full z-0"></div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/3 h-1 bg-blue-800 rounded-full z-0"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-blue-800 text-white font-bold flex items-center justify-center border-4 border-slate-50 shadow-md">
                    <i class="fas fa-check text-sm"></i>
                </div>
                <span class="text-[10px] font-bold text-blue-800 uppercase tracking-widest mt-2">Account</span>
            </div>
            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-blue-800 text-white font-bold flex items-center justify-center border-4 border-slate-50 shadow-md shadow-blue-800/20 ring-4 ring-blue-50">
                    2
                </div>
                <span class="text-[10px] font-bold text-blue-800 uppercase tracking-widest mt-2">Property</span>
            </div>
            
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-400 font-bold flex items-center justify-center border-4 border-slate-50">
                    3
                </div>
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-2">Payment</span>
            </div>
        </div>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        
        <form action="#" method="POST" class="p-8 sm:p-10">
            @csrf
            
            <div class="mb-8">
                <h2 class="text-xl font-bold text-slate-900">Property Details</h2>
                <p class="text-sm text-slate-500 mt-1">Tell us a bit about your property to help us customize your experience.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                {{-- Property Name --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Property Name *</label>
                    <input type="text" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-900 focus:ring-2 focus:ring-blue-800/20 focus:border-blue-800 transition-colors shadow-sm" placeholder="e.g. Grand Plaza Hotel">
                </div>
                
                {{-- Property Type --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Property Type *</label>
                    <div class="relative">
                        <select class="w-full pl-4 pr-10 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-900 focus:ring-2 focus:ring-blue-800/20 focus:border-blue-800 transition-colors shadow-sm appearance-none">
                            <option>Hotel</option>
                            <option>Resort</option>
                            <option>Hostel</option>
                            <option>Apartment</option>
                            <option>Villa</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                    </div>
                </div>
                
                {{-- Number of Rooms --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Number of Rooms *</label>
                    <div class="relative">
                        <select class="w-full pl-4 pr-10 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-900 focus:ring-2 focus:ring-blue-800/20 focus:border-blue-800 transition-colors shadow-sm appearance-none">
                            <option>1 - 10 rooms</option>
                            <option>11 - 50 rooms</option>
                            <option>51 - 100 rooms</option>
                            <option>100+ rooms</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                    </div>
                </div>

                {{-- Business Email --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Business Email *</label>
                    <input type="email" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-900 focus:ring-2 focus:ring-blue-800/20 focus:border-blue-800 transition-colors shadow-sm" placeholder="info@property.com">
                </div>

                {{-- Phone Number --}}
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1.5">Phone Number *</label>
                    <input type="tel" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg text-sm text-slate-900 focus:ring-2 focus:ring-blue-800/20 focus:border-blue-800 transition-colors shadow-sm" placeholder="+1 (555) 000-0000">
                </div>
            </div>

            <div class="mb-8">
                <h2 class="text-xl font-bold text-slate-900">OTA & Connectivity Integration</h2>
                <p class="text-sm text-slate-500 mt-1">Select the platforms you currently use to map your channel manager.</p>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
                <label class="relative flex flex-col items-center justify-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                    <input type="checkbox" class="absolute right-3 top-3 w-4 h-4 text-blue-800 focus:ring-blue-800 border-slate-300 rounded cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mb-2 mt-2 group-hover:scale-110 transition-transform">
                        <i class="fas fa-bed"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Booking.com</span>
                </label>
                <label class="relative flex flex-col items-center justify-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                    <input type="checkbox" class="absolute right-3 top-3 w-4 h-4 text-blue-800 focus:ring-blue-800 border-slate-300 rounded cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center mb-2 mt-2 group-hover:scale-110 transition-transform">
                        <i class="fab fa-airbnb"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Airbnb</span>
                </label>
                <label class="relative flex flex-col items-center justify-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                    <input type="checkbox" class="absolute right-3 top-3 w-4 h-4 text-blue-800 focus:ring-blue-800 border-slate-300 rounded cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-2 mt-2 group-hover:scale-110 transition-transform">
                        <i class="fas fa-plane"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Expedia</span>
                </label>
                <label class="relative flex flex-col items-center justify-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition-all group">
                    <input type="checkbox" class="absolute right-3 top-3 w-4 h-4 text-blue-800 focus:ring-blue-800 border-slate-300 rounded cursor-pointer">
                    <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center mb-2 mt-2 group-hover:scale-110 transition-transform">
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-700">Other OTA</span>
                </label>
            </div>

            <div class="border-t border-slate-100 pt-8 flex items-center justify-between">
                <button type="button" class="text-slate-500 hover:text-slate-700 font-bold text-sm px-4 py-2 transition-colors">
                    &larr; Back
                </button>
                <button type="button" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 px-8 rounded-lg shadow-lg shadow-blue-800/20 transition-all active:scale-[0.98] flex items-center gap-2">
                    Continue to Payment <i class="fas fa-arrow-right text-sm"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<footer class="bg-slate-900 py-12 mt-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="text-slate-400 text-sm">&copy; {{ date('Y') }} Merahkie Cloud PMS. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
