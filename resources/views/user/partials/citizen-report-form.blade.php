<div class="bg-white/40 backdrop-blur-md rounded-3xl p-4 md:p-6 shadow-sm border border-white/40 relative overflow-hidden">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2 sm:gap-0">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-indigo-100 text-indigo-600 rounded-xl">
                <i data-lucide="megaphone" class="w-5 h-5"></i>
            </div>
            <h3 class="text-base font-bold text-slate-800">Lapor Kondisi Area</h3>
        </div>
    </div>
    <p class="text-xs text-slate-500 mb-4 line-clamp-2">Laporkan jika terjadi genangan air abnormal di wilayah Anda.</p>
    
    <form id="citizenReportForm" class="space-y-4">
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Lokasi Detail (Sungai)</label>
            <select id="reportLokasi" name="nama_sungai" required class="w-full bg-white/60 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">
                <option value="" disabled selected>Pilih Aliran Sungai...</option>
                <option value="Sungai Gumbasa">Wilayah Sekitar Aliran Sungai Gumbasa</option>
                <option value="Sungai Lariang">Wilayah Sekitar Aliran Sungai Lariang</option>
                <option value="Sungai Lindu">Wilayah Sekitar Aliran Sungai Lindu</option>
                <option value="Sungai Samba">Wilayah Sekitar Aliran Sungai Samba</option>
                <option value="Sungai Pakuli">Wilayah Sekitar Aliran Sungai Pakuli</option>
                <option value="Sungai Marawola">Wilayah Sekitar Aliran Sungai Marawola</option>
                <option value="Sungai Palolo">Wilayah Sekitar Aliran Sungai Palolo</option>
                <option value="Sungai Kulawi">Wilayah Sekitar Aliran Sungai Kulawi</option>
                <option value="Sungai Ngatabaru">Wilayah Sekitar Aliran Sungai Ngatabaru</option>
                <option value="Sungai Wuno">Wilayah Sekitar Aliran Sungai Wuno</option>
                <option value="Sungai Bangga">Wilayah Sekitar Aliran Sungai Bangga</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Tingkat Genangan</label>
            <select id="reportGenangan" required class="w-full bg-white/60 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none appearance-none">
                <option value="" disabled selected>Pilih Dampak Luapan...</option>
                <option value="Aman">Aman / Normal (Belum Meluap / Genangan Hujan)</option>
                <option value="Waspada">Waspada (Air Mulai Masuk Jalanan / Semata Kaki)</option>
                <option value="Siaga">Siaga (Air Masuk ke Rumah Warga / Selutut)</option>
                <option value="Bahaya">Bahaya (Banjir Bandang Kritis / Sepinggang atau Lebih)</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Catatan Tambahan (Opsional)</label>
            <textarea id="reportDeskripsi" rows="2" placeholder="Cth: Air sudah masuk ke pemukiman di Desa Oluboju, butuh bantuan evakuasi lansia..." class="w-full bg-white/60 border border-slate-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none resize-none"></textarea>
        </div>
        <button type="submit" id="btnSubmitReport" class="w-full py-2.5 bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white font-bold text-sm rounded-xl transition-all shadow-md flex items-center justify-center gap-2">
            <i data-lucide="send" class="w-4 h-4"></i> Kirim Laporan Warga
        </button>
    </form>
</div>
