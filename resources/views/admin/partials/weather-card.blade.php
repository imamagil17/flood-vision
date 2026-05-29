                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl p-6 shadow-md text-white flex flex-col justify-between relative overflow-hidden group">
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full blur-2xl group-hover:bg-white/20 transition-colors"></div>
                            
                            <div id="weatherSkeleton" class="animate-pulse flex flex-col h-full justify-between">
                                <div class="h-6 bg-white/20 rounded w-1/2 mb-4"></div>
                                <div class="flex gap-4 items-end">
                                    <div class="h-12 bg-white/20 rounded w-24"></div>
                                    <div class="h-6 bg-white/20 rounded w-32 mb-1"></div>
                                </div>
                            </div>

                            <div id="weatherContent" class="hidden h-full flex flex-col justify-between relative z-10">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-sm font-semibold text-blue-100 tracking-wider uppercase flex items-center gap-2">
                                        <i data-lucide="cloud" class="w-4 h-4"></i> Cuaca Saat Ini
                                    </h3>
                                    <span class="bg-white/20 px-2 py-1 rounded text-xs font-bold backdrop-blur-sm" id="weatherCity">Lokasi</span>
                                </div>
                                <div class="flex items-end gap-3 mt-4">
                                    <span class="text-6xl font-black tracking-tighter drop-shadow-sm" id="weatherTemp">--°</span>
                                    <div class="mb-2">
                                        <p class="font-bold text-xl drop-shadow-sm" id="weatherDesc">Memuat...</p>
                                        <p class="text-blue-100 text-sm font-medium flex items-center gap-1"><i data-lucide="droplets" class="w-3 h-3"></i> Kelembapan: <span id="weatherHumidity">--</span>%</p>
                                    </div>
                                </div>
                            </div>
                        </div>