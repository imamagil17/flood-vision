<div id="modalBerita" class="fixed inset-0 z-[100] hidden bg-slate-900/80 backdrop-blur-md flex-col items-center justify-center p-4 md:p-8 transition-opacity duration-300 opacity-0">
    <div class="bg-white/90 backdrop-blur-xl rounded-3xl w-full max-w-4xl overflow-hidden shadow-2xl flex flex-col max-h-[90vh] md:max-h-[85vh] transform scale-95 transition-transform duration-300 border border-white/20" id="modalBeritaContent">
        
        <div class="flex justify-between items-center p-5 border-b border-slate-200/50 bg-slate-50/50">
            <div class="flex items-center gap-3">
                <span class="bg-blue-100/80 text-blue-700 text-xs font-bold px-3 py-1.5 rounded-full flex items-center gap-1.5 backdrop-blur-sm">
                    <i data-lucide="calendar" class="w-4 h-4"></i> <span id="modalBeritaTanggal"></span>
                </span>
                <span class="text-slate-400 text-sm font-medium hidden md:inline-block">— Sistem Mitigasi Banjir Cerdas</span>
            </div>
            <button onclick="tutupModalBerita()" class="p-2 bg-slate-200/80 hover:bg-red-100 hover:text-red-600 text-slate-500 rounded-full transition-colors focus:outline-none backdrop-blur-sm">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <div class="overflow-y-auto p-6 md:p-10 custom-scrollbar bg-transparent">
            <img id="modalBeritaFoto" src="" class="w-full h-64 md:h-96 object-cover rounded-2xl mb-8 shadow-md hidden" alt="Foto Berita">
            
            <h2 id="modalBeritaJudul" class="text-3xl md:text-4xl font-black text-slate-800 mb-8 leading-tight"></h2>
            
            <div id="modalBeritaDeskripsi" class="text-slate-700 text-[16px] md:text-[17px] leading-loose whitespace-pre-wrap font-normal text-justify"></div>
        </div>
    </div>
</div>
