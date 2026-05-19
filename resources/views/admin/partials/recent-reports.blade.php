                    <div class="bg-white/70 backdrop-blur-md rounded-3xl p-6 shadow-sm border border-slate-200/60">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="p-2 bg-rose-100 text-rose-600 rounded-xl">
                                    <i data-lucide="megaphone" class="w-4 h-4"></i>
                                </div>
                                <h3 class="text-sm font-bold text-slate-800 tracking-tight">Laporan Darurat Baru</h3>
                            </div>
                            <a href="{{ route('admin.citizen_reports.index') }}" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 transition-colors">
                                Kelola <i data-lucide="arrow-right" class="w-3 h-3"></i>
                            </a>
                        </div>

                        <div class="space-y-3">
                            @forelse($reports ?? [] as $report)
                            <div class="bg-slate-50 border border-slate-100 p-3 rounded-2xl relative group">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="text-xs font-bold text-slate-700 truncate w-2/3" title="{{ $report->lokasi }}">{{ $report->lokasi }}</span>
                                    <span class="text-[10px] text-slate-400 font-medium">{{ $report->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex gap-2">
                                        @if($report->tingkat_genangan == 'Tinggi')
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-red-100 text-red-700 border border-red-200">Tinggi</span>
                                        @elseif($report->tingkat_genangan == 'Sedang')
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-orange-100 text-orange-700 border border-orange-200">Sedang</span>
                                        @else
                                            <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-blue-100 text-blue-700 border border-blue-200">Rendah</span>
                                        @endif
                                        
                                        <div id="status-report-{{ $report->id }}">
                                            @if($report->status == 'Pending')
                                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-amber-100 text-amber-700 border border-amber-200">Pending</span>
                                            @else
                                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-md bg-emerald-100 text-emerald-700 border border-emerald-200"><i data-lucide="check" class="w-2.5 h-2.5 inline"></i> Verif</span>
                                            @endif
                                        </div>
                                    </div>

                                    @if($report->status == 'Pending')
                                        <button onclick="verifikasiLaporan({{ $report->id }}, this)" class="px-2 py-1 text-[10px] font-bold bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors flex items-center gap-1 shadow-sm">
                                            <i data-lucide="check" class="w-3 h-3"></i>
                                        </button>
                                    @endif
                                </div>
                                <p class="text-xs text-slate-500 mt-2 truncate">{{ $report->deskripsi ?: 'Tanpa catatan' }}</p>
                            </div>
                            @empty
                            <div class="text-center py-6 text-slate-400 text-xs">Belum ada laporan terbaru.</div>
                            @endforelse
                        </div>
                    </div>
