<section class="relative z-10 max-w-6xl mx-auto px-4 w-full mb-28 reveal-on-scroll">
    <div class="bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 md:p-12 border border-slate-200/60 shadow-sm">
        <div class="text-center mb-12">
            <span class="text-xs font-bold text-blue-600 uppercase tracking-widest bg-blue-50 px-3 py-1 rounded-full">Arsitektur Kerja</span>
            <h2 class="text-3xl font-black text-slate-800 mt-3">Bagaimana Sistem Bekerja?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            
            <div class="flex flex-col items-center text-center relative z-10 p-5 rounded-3xl border border-transparent hover:border-slate-200/80 hover:bg-white hover:shadow-xl hover:shadow-blue-500/5 hover:-translate-y-3 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-blue-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-blue-500/20 mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">1</div>
                <h4 class="font-bold text-slate-800 mb-1 text-base group-hover:text-blue-600 transition-colors">Capture Kamera</h4>
                <p class="text-xs text-slate-500 max-w-[180px]">Kamera node menangkap tayangan air permukaan sungai secara real-time.</p>
            </div>

            <div class="flex flex-col items-center text-center relative z-10 p-5 rounded-3xl border border-transparent hover:border-slate-200/80 hover:bg-white hover:shadow-xl hover:shadow-indigo-500/5 hover:-translate-y-3 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-indigo-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-indigo-500/20 mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">2</div>
                <h4 class="font-bold text-slate-800 mb-1 text-base group-hover:text-indigo-600 transition-colors">Proses OpenCV</h4>
                <p class="text-xs text-slate-500 max-w-[180px]">Matriks visual dihitung menggunakan canny edge untuk menentukan persentase level air.</p>
            </div>

            <div class="flex flex-col items-center text-center relative z-10 p-5 rounded-3xl border border-transparent hover:border-slate-200/80 hover:bg-white hover:shadow-xl hover:shadow-cyan-500/5 hover:-translate-y-3 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-cyan-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-cyan-500/20 mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">3</div>
                <h4 class="font-bold text-slate-800 mb-1 text-base group-hover:text-cyan-600 transition-colors">Analisis AI</h4>
                <p class="text-xs text-slate-500 max-w-[180px]">Data dikombinasikan dengan API cuaca untuk memprediksi skor risiko banjir ke depan.</p>
            </div>

            <div class="flex flex-col items-center text-center relative z-10 p-5 rounded-3xl border border-transparent hover:border-slate-200/80 hover:bg-white hover:shadow-xl hover:shadow-emerald-500/5 hover:-translate-y-3 transition-all duration-300 group cursor-pointer">
                <div class="w-16 h-16 bg-emerald-600 text-white rounded-2xl flex items-center justify-center font-bold text-xl shadow-lg shadow-emerald-500/20 mb-4 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">4</div>
                <h4 class="font-bold text-slate-800 mb-1 text-base group-hover:text-emerald-600 transition-colors">Siaran Darurat</h4>
                <p class="text-xs text-slate-500 max-w-[180px]">Bot otomatis menyiarkan perintah evakuasi dan pesan siaga ke grup Telegram warga.</p>
            </div>

        </div>
    </div>
</section>

<section class="relative z-10 max-w-7xl mx-auto px-4 w-full mb-28 reveal-on-scroll">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <div class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-600 uppercase tracking-wider bg-indigo-50 px-3 py-1 rounded-full">
                <i data-lucide="map-pin" class="w-3.5 h-3.5"></i> Fokus Lokasi Pemantauan
            </div>
            <h2 class="text-3xl md:text-4xl font-black text-slate-800 leading-tight">
                Sistem Mitigasi Banjir Cerdas <br>Untuk Mengamankan Bantaran Sungai
            </h2>
            <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                Sistem difokuskan untuk melakukan pemantauan intensif di titik rawan luapan air, terutama di sekitar area perumahan warga melalui penerapan Sistem Mitigasi Banjir Cerdas.
            </p>
            
            <div class="grid grid-cols-2 gap-4 pt-2">
                <div class="p-4 bg-white border border-slate-100 rounded-2xl shadow-sm flex items-center gap-3 hover:-translate-y-1.5 hover:shadow-md hover:border-blue-100 transition-all duration-300 group cursor-pointer">
                    <div class="p-2 bg-blue-50 text-blue-600 rounded-xl group-hover:bg-blue-600 group-hover:text-white group-hover:scale-105 transition-all duration-300">
                        <i data-lucide="lightning" class="w-5 h-5 hidden"></i> <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors">Respons Cepat</h5>
                        <p class="text-xs text-slate-400">Deteksi hitungan detik</p>
                    </div>
                </div>
                
                <div class="p-4 bg-white border border-slate-100 rounded-2xl shadow-sm flex items-center gap-3 hover:-translate-y-1.5 hover:shadow-md hover:border-emerald-100 transition-all duration-300 group cursor-pointer">
                    <div class="p-2 bg-emerald-50 text-emerald-600 rounded-xl group-hover:bg-emerald-600 group-hover:text-white group-hover:scale-105 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-slate-800 text-sm group-hover:text-emerald-600 transition-colors">Akses Publik</h5>
                        <p class="text-xs text-slate-400">Dapat dipantau semua warga</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-[2.5rem] transform rotate-2 opacity-5 scale-105"></div>
            <div class="bg-slate-900 rounded-[2.5rem] shadow-xl border border-slate-200/80 overflow-hidden relative aspect-video">
                <video src="{{ asset('videos/arus.mp4') }}" class="w-full h-full object-cover" autoplay loop playsinline muted></video>
            </div>
        </div>

    </div>
</section>
