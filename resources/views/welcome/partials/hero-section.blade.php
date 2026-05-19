<main class="relative z-10 flex-grow flex flex-col justify-center items-center text-center px-4 max-w-5xl mx-auto mt-16 md:mt-24">
    
    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-200 text-blue-700 text-xs font-bold uppercase tracking-wider mb-8 shadow-sm">
        <span class="w-2.5 h-2.5 rounded-full bg-blue-500 animate-pulse"></span>
        Sistem Aktif & Memantau Lokasi
    </div>
    
    <h1 class="text-5xl md:text-7xl font-extrabold text-slate-800 mb-6 leading-tight tracking-tight opacity-0 animate-[slideDown_0.8s_ease-out_forwards]">
        Pemantauan Banjir <br/> 
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600 relative inline-block">
            Cerdas & Real-Time
            <span class="absolute inset-0 bg-blue-400 blur-2xl opacity-20 animate-[pulse_3s_ease-in-out_infinite]"></span>
        </span>
    </h1>
    
    <p class="text-lg md:text-xl text-slate-600 max-w-2xl mb-10 leading-relaxed">
        Sistem mitigasi dini terintegrasi <b>Computer Vision</b> dan <b>AI</b> sebagai wujud Sistem Mitigasi Banjir Cerdas. Pantau level air, cuaca, and prediksi risiko dalam satu platform modern.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 mb-16">
        <a href="{{ route('login') }}" class="group relative inline-flex items-center justify-center px-8 py-4 font-bold text-white transition-all duration-200 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-full hover:from-blue-500 hover:to-indigo-500 shadow-lg shadow-blue-500/30 transform hover:-translate-y-1">
            Mulai Pantau Sekarang
            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
        <a href="#fitur" class="inline-flex items-center justify-center px-8 py-4 font-bold text-slate-700 bg-white border border-slate-200 rounded-full hover:bg-slate-50 transition-colors shadow-sm">
            Pelajari Fitur
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-12 pt-8 border-t border-slate-200/60 w-full max-w-3xl mb-24">
        <div>
            <h4 class="text-3xl font-extrabold text-blue-600">24/7</h4>
            <p class="text-sm font-medium text-slate-500 mt-1">Monitoring Aktif</p>
        </div>
        <div>
            <h4 class="text-3xl font-extrabold text-indigo-600">AI</h4>
            <p class="text-sm font-medium text-slate-500 mt-1">Powered Analytics</p>
        </div>
        <div>
            <h4 class="text-3xl font-extrabold text-cyan-600">OpenCV</h4>
            <p class="text-sm font-medium text-slate-500 mt-1">Visual Processing</p>
        </div>
        <div>
            <h4 class="text-3xl font-extrabold text-emerald-500">Real-time</h4>
            <p class="text-sm font-medium text-slate-500 mt-1">Notifikasi Telegram</p>
        </div>
    </div>
</main>
