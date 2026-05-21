<section class="relative z-10 max-w-6xl mx-auto px-4 w-full mb-20 reveal-on-scroll">
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