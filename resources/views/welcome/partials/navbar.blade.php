<nav class="relative z-50 px-6 py-6 max-w-7xl mx-auto w-full flex justify-between items-center opacity-0 animate-[slideDown_0.6s_ease-out_forwards]">
    <div class="flex items-center gap-3 group cursor-pointer">
        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12c2.667 0 5.333-2 8-2s5.333 2 8 2 5.333-2 8-2M2 18c2.667 0 5.333-2 8-2s5.333 2 8 2 5.333-2 8-2M2 6c2.667 0 5.333-2 8-2s5.333 2 8 2 5.333-2 8-2"></path>
            </svg>
        </div>
        <span class="font-extrabold text-xl tracking-tight text-slate-800">Flood Vision</span>
    </div>

    @if (Route::has('login'))
        <div class="flex items-center gap-5">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">Ke Dashboard &rarr;</a>
            @else
                <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-blue-600 transition">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-semibold bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-500 hover:to-indigo-500 text-white px-6 py-2.5 rounded-full shadow-lg shadow-blue-600/30 transition-all transform hover:-translate-y-0.5">Register</a>
                @endif
            @endauth
        </div>
    @endif
</nav>
