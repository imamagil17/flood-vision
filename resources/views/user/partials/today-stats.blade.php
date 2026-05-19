<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <div class="bg-white/40 backdrop-blur-md border border-white/40 rounded-2xl p-4 flex items-center gap-4 shadow-sm">
        <div class="p-3 bg-blue-100/80 text-blue-600 rounded-xl">
            <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-0.5">Rata-rata Air</p>
            <p class="text-xl font-black text-slate-800" id="statRataRata">--%</p>
        </div>
    </div>
    <div class="bg-white/40 backdrop-blur-md border border-white/40 rounded-2xl p-4 flex items-center gap-4 shadow-sm">
        <div class="p-3 bg-amber-100/80 text-amber-600 rounded-xl">
            <i data-lucide="bell-ring" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-0.5">Peringatan (Harian)</p>
            <p class="text-xl font-black text-slate-800" id="statPeringatan">--</p>
        </div>
    </div>
    <div class="bg-white/40 backdrop-blur-md border border-white/40 rounded-2xl p-4 flex items-center gap-4 shadow-sm relative overflow-hidden">
        <div class="absolute -right-4 -bottom-4 w-20 h-20 bg-green-500/10 rounded-full blur-xl"></div>
        <div class="p-3 bg-emerald-100/80 text-emerald-600 rounded-xl">
            <i data-lucide="activity" class="w-5 h-5"></i>
        </div>
        <div>
            <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-0.5">Sistem Sensor</p>
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping absolute"></span>
                <span class="w-2 h-2 rounded-full bg-emerald-500 relative inline-flex"></span>
                <p class="text-sm font-black text-emerald-600">OPTIMAL</p>
            </div>
        </div>
    </div>
</div>
