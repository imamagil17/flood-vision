<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-md overflow-hidden shadow-sm rounded-3xl border border-slate-200/60 p-8">
                
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="p-3 bg-indigo-100 text-indigo-600 rounded-2xl shadow-sm">
                            <i data-lucide="clipboard-list" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 tracking-tight">Daftar Laporan Genangan</h3>
                            <p class="text-sm text-slate-500 mt-1">Kelola laporan yang dikirimkan warga dari dashboard mereka.</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50/50">
                            <tr class="border-b border-slate-200">
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Pelapor</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Genangan</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Deskripsi</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($reports as $report)
                            <tr class="hover:bg-slate-50/80 transition-colors group">
                                <td class="px-6 py-5 text-sm font-medium text-slate-600 whitespace-nowrap">{{ $report->created_at->format('d M Y, H:i') }}</td>
                                <td class="px-6 py-5 text-sm font-semibold text-slate-700 whitespace-nowrap">
                                    {{ $report->user ? $report->user->name : 'Anonim' }}
                                </td>
                                <td class="px-6 py-5 text-sm font-bold text-slate-800">{{ $report->lokasi }}</td>
                                <td class="px-6 py-5 whitespace-nowrap">
                                    @if($report->tingkat_genangan == 'Tinggi')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-red-100 text-red-700 border border-red-200 inline-block shadow-sm">Tinggi</span>
                                    @elseif($report->tingkat_genangan == 'Sedang')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-orange-100 text-orange-700 border border-orange-200 inline-block shadow-sm">Sedang</span>
                                    @else
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-blue-100 text-blue-700 border border-blue-200 inline-block shadow-sm">Rendah</span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-sm text-slate-600 max-w-[250px] truncate" title="{{ $report->deskripsi }}">{{ $report->deskripsi ?: '-' }}</td>
                                <td class="px-6 py-5 whitespace-nowrap" id="status-report-{{ $report->id }}">
                                    @if($report->status == 'Pending')
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-amber-100 text-amber-700 border border-amber-200 inline-block shadow-sm">Pending</span>
                                    @else
                                        <span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-emerald-100 text-emerald-700 border border-emerald-200 inline-flex items-center gap-1.5 shadow-sm">
                                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Terverifikasi
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-right whitespace-nowrap">
                                    @if($report->status == 'Pending')
                                        <button onclick="verifikasiLaporan({{ $report->id }}, this)" class="px-4 py-2 text-xs font-bold bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 shadow-md hover:shadow-lg hover:-translate-y-0.5 transition-all flex items-center gap-2 ml-auto">
                                            <i data-lucide="check" class="w-4 h-4"></i> Verifikasi
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-500 font-medium">
                                    <div class="flex flex-col items-center justify-center">
                                        <i data-lucide="inbox" class="w-12 h-12 text-slate-300 mb-3"></i>
                                        <p>Belum ada laporan dari warga.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Paginasi Laravel -->
                <div class="mt-6">
                    {{ $reports->links() }}
                </div>
                
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        async function verifikasiLaporan(id, btn) {
            btn.innerHTML = '<i data-lucide="loader-2" class="w-4 h-4 animate-spin"></i> Proses...';
            lucide.createIcons();
            
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const response = await fetch(`/admin/reports/${id}/verify`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                
                const resData = await response.json();
                if (response.ok && resData.success) {
                    const statusTd = document.getElementById(`status-report-${id}`);
                    statusTd.innerHTML = '<span class="px-3 py-1.5 text-xs font-bold rounded-xl bg-emerald-100 text-emerald-700 border border-emerald-200 inline-flex items-center gap-1.5 shadow-sm"><i data-lucide="check-circle" class="w-3.5 h-3.5"></i> Terverifikasi</span>';
                    btn.remove();
                    lucide.createIcons();
                } else {
                    alert('Gagal memverifikasi laporan.');
                    btn.innerHTML = '<i data-lucide="check" class="w-4 h-4"></i> Verifikasi';
                    lucide.createIcons();
                }
            } catch (e) {
                console.error(e);
                alert('Kesalahan jaringan.');
                btn.innerHTML = '<i data-lucide="check" class="w-4 h-4"></i> Verifikasi';
                lucide.createIcons();
            }
        }
    </script>
    @endpush
</x-app-layout>
