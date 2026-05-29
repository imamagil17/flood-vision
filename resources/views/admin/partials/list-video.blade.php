<div class="lg:col-span-7 space-y-8">
    
    <!-- 1. Card Preview Hasil Deteksi YOLO ("Video Terdeteksi") -->
    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm flex flex-col relative overflow-hidden" id="yoloPreviewCard">
        <h2 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
            <i data-lucide="scan" class="w-5 h-5 text-indigo-600 animate-pulse"></i> Video Terdeteksi (Hasil Analisis YOLO)
        </h2>
        
        <!-- Placeholder awal sebelum upload -->
        <div id="previewPlaceholder" class="flex flex-col items-center justify-center py-12 text-center text-slate-400">
            <div class="w-16 h-16 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center text-slate-400 mb-3">
                <i data-lucide="video-off" class="w-6 h-6"></i>
            </div>
            <p class="text-sm font-bold text-slate-700">Belum Ada Video Diproses</p>
            <p class="text-xs text-slate-400 mt-1 max-w-[280px]">Unggah file video di panel kiri untuk memulai simulasi pengujian YOLO v8 & OpenCV.</p>
        </div>

        <!-- Loader awal saat pemrosesan YOLO -->
        <div id="previewLoader" class="hidden flex flex-col items-center justify-center py-12 text-center text-slate-400">
            <div class="relative w-16 h-16 mb-4">
                <div class="absolute inset-0 rounded-full border-4 border-slate-100 border-t-indigo-600 animate-spin"></div>
                <div class="absolute inset-2 bg-white rounded-full flex items-center justify-center">
                    <i data-lucide="cpu" class="w-5 h-5 text-indigo-600 animate-pulse"></i>
                </div>
            </div>
            <p class="text-sm font-bold text-slate-700 animate-pulse">Menganalisis Video...</p>
            <p class="text-xs text-slate-400 mt-1 max-w-[280px]">Model YOLO v8 & Computer Vision sedang mengekstrak koordinat air sungai secara real-time.</p>
        </div>

        <!-- Konten Preview setelah simulasi berjalan -->
        <div id="previewContent" class="hidden space-y-4">
            <div class="flex flex-col md:flex-row gap-6 items-start">
                
                <!-- Video Player/Thumbnail Preview (Military-grade overlay style) -->
                <div class="relative w-full md:w-56 aspect-video bg-slate-950 rounded-2xl overflow-hidden shadow-inner ring-1 ring-slate-900/10 shrink-0 flex items-center justify-center group">
                    <video id="previewVideoPlayer" class="absolute inset-0 w-full h-full object-cover hidden z-0" muted loop playsinline></video>
                    
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/30 to-slate-950/60 z-10 flex flex-col justify-between p-3">
                        <div class="flex justify-between items-center">
                            <span class="px-2 py-0.5 text-[8px] font-bold text-emerald-400 border border-emerald-500/30 bg-emerald-950/50 rounded-md tracking-widest uppercase">YOLO v8 LIVE</span>
                            <span class="text-[9px] font-bold text-white/70" id="previewDuration">00:15</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-white">
                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full animate-ping"></span>
                            <span class="text-[8px] font-bold uppercase tracking-wider">Analysis HUD</span>
                        </div>
                    </div>
                    
                    <button onclick="togglePreviewVideo()" type="button" class="absolute z-20 w-10 h-10 flex items-center justify-center bg-white/10 hover:bg-white/20 border border-white/20 rounded-full text-white backdrop-blur-sm opacity-80 group-hover:scale-110 transition-all cursor-pointer">
                        <i id="previewPlayIcon" data-lucide="play" class="w-5 h-5 fill-white text-white"></i>
                    </button>
                    
                    <!-- Scanline HUD effect -->
                    <div id="previewScanline" class="absolute inset-0 pointer-events-none z-20 flex items-center justify-center">
                        <div class="w-full h-0.5 bg-indigo-500 shadow-[0_0_10px_#6366f1] animate-[bounce_2s_infinite]"></div>
                    </div>
                </div>

                <!-- Informasi Hasil Analisis -->
                <div class="flex-grow space-y-3 min-w-0 w-full">
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Nama File Video</p>
                        <h4 class="font-bold text-slate-800 text-sm truncate" id="previewFileName">filename.mp4</h4>
                    </div>

                    <div class="grid grid-cols-2 gap-4 pt-1">
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Tinggi Air (CV)</p>
                            <p class="text-xl font-black text-slate-800" id="previewWaterLevel">-- cm</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">Akurasi YOLO</p>
                            <p class="text-xl font-black text-blue-600" id="previewYoloAccuracy">--%</p>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-100 flex items-center justify-between gap-4">
                        <div>
                            <p class="text-[9px] text-slate-400 font-bold uppercase tracking-wider mb-1">Status Ketinggian</p>
                            <div id="previewStatusBadge">
                                <!-- Rendered dynamically -->
                            </div>
                        </div>
                        <button onclick="saveSimulatedResult()" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs rounded-xl shadow-md transition-all flex items-center gap-1.5 shrink-0">
                            <i data-lucide="save" class="w-3.5 h-3.5"></i> Simpan Log
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Card Video Tersimpan -->
    <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm flex flex-col">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
            <h2 class="text-base font-bold text-slate-800">Video Tersimpan</h2>
            
            <div class="relative w-full sm:w-60 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2 flex items-center gap-2 focus-within:ring-2 focus-within:ring-blue-500/20 focus-within:border-blue-500 transition-all">
                <i data-lucide="search" class="w-4 h-4 text-slate-400"></i>
                <input type="text" id="searchVideo" class="bg-transparent outline-none border-none text-xs text-slate-700 placeholder-slate-400 w-full" placeholder="Cari video...">
            </div>
        </div>
        <button class="mt-4 w-full py-2.5 bg-slate-50 hover:bg-slate-100 text-slate-500 hover:text-slate-800 border border-slate-200 rounded-2xl text-xs font-bold transition-all flex items-center justify-center gap-2">
            <i data-lucide="refresh-cw" class="w-3.5 h-3.5"></i> Muat lebih banyak
        </button>
    </div>
</div>
