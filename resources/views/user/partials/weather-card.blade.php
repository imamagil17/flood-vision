<div class="bg-white/70 backdrop-blur-lg border border-white/50 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl p-4 md:p-6 text-slate-800 flex flex-col justify-between relative overflow-hidden group">
    <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-100/30 rounded-full blur-2xl group-hover:bg-blue-100/50 transition-colors"></div>
    
    <div id="weatherSkeleton" class="animate-pulse flex flex-col h-full justify-between">
        <div class="h-6 bg-slate-200/50 rounded w-1/2 mb-4"></div>
        <div class="flex flex-col sm:flex-row gap-4 sm:items-end">
            <div class="h-12 bg-slate-200/50 rounded w-24"></div>
            <div class="h-6 bg-slate-200/50 rounded w-32 mb-1"></div>
        </div>
    </div>

    <div id="weatherContent" class="hidden h-full flex flex-col justify-between relative z-10">
        <div class="flex flex-col md:flex-row md:justify-between items-start gap-2 md:gap-0">
            <h3 class="text-sm font-bold text-slate-400 tracking-wider uppercase flex items-center gap-2">
                <i data-lucide="cloud" class="w-4 h-4 text-blue-500"></i> Cuaca Saat Ini
            </h3>
            <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded-xl text-xs font-bold truncate max-w-full border border-slate-200/50" id="weatherCity">Lokasi</span>
        </div>
        <div class="flex flex-col sm:flex-row items-start sm:items-end gap-3 mt-4">
            <span class="text-5xl sm:text-6xl font-black tracking-tighter text-slate-800 drop-shadow-sm" id="weatherTemp">--°</span>
            <div class="mb-0 sm:mb-2">
                <p class="font-bold text-lg sm:text-xl text-slate-700 truncate max-w-[200px]" id="weatherDesc">Memuat...</p>
                <p class="text-slate-500 text-xs sm:text-sm font-medium flex items-center gap-1"><i data-lucide="droplets" class="w-3 h-3 text-blue-400"></i> Kelembapan: <span id="weatherHumidity">--</span>%</p>
            </div>
        </div>
    </div>
</div>
