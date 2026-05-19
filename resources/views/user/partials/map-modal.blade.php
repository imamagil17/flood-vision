<div id="mapModal" class="fixed inset-0 z-[60] hidden bg-black/80 backdrop-blur-sm flex-col items-center justify-center transition-opacity duration-300">
    <button onclick="toggleMapModal()" class="absolute top-6 right-6 p-3 bg-white/10 hover:bg-white/20 text-white rounded-full transition-colors backdrop-blur-md z-[70]">
        <i data-lucide="x" class="w-6 h-6"></i>
    </button>
    
    <div class="w-full max-w-4xl px-4 relative flex flex-col items-center">
        <div class="bg-white rounded-3xl overflow-hidden shadow-2xl w-full border border-white/20">
            <div class="p-6 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                <h3 class="text-xl font-bold flex items-center gap-2">
                    <i data-lucide="map-pin" class="w-5 h-5"></i> Peta Jalur & Titik Evakuasi
                </h3>
                <p class="text-blue-100 text-sm mt-1">Gunakan peta ini untuk mencari rute teraman menuju Kantor BPBD Setempat atau lapangan terbuka terdekat.</p>
            </div>
            
            <div class="w-full h-[60vh] bg-slate-100 relative">
                <div class="absolute inset-0 flex items-center justify-center text-slate-400">
                    <i data-lucide="loader-2" class="w-8 h-8 animate-spin"></i>
                </div>
                <iframe 
                    src="https://www.google.com/maps?q=Kantor+BPBD&output=embed" 
                    class="relative z-10 w-full h-full" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
