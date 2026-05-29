                        <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-3xl p-6 shadow-md text-white flex flex-col justify-between relative overflow-hidden transition-colors duration-500" id="aiInsightsCard">
                            <div class="absolute -top-10 -left-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                            
                            <div id="aiSkeleton" class="animate-pulse flex flex-col h-full justify-between">
                                <div class="flex justify-between mb-4">
                                    <div class="h-6 bg-white/20 rounded w-1/2"></div>
                                    <div class="h-6 bg-white/20 rounded w-16"></div>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div class="h-12 bg-white/20 rounded w-20"></div>
                                    <div class="h-16 w-16 bg-white/20 rounded-full"></div>
                                </div>
                            </div>

                            <div id="aiContent" class="hidden h-full flex flex-col justify-between relative z-10">
                                <div class="flex justify-between items-start">
                                    <h3 class="text-sm font-semibold text-white/80 tracking-wider uppercase flex items-center gap-2">
                                        <i data-lucide="brain-circuit" class="w-4 h-4"></i> AI Prediction
                                    </h3>
                                    <span class="bg-white/20 px-2 py-1 rounded text-xs font-bold backdrop-blur-sm">30 MIN AHEAD</span>
                                </div>
                                <div class="flex justify-between items-end mt-4">
                                    <div>
                                        <p class="text-white/80 text-xs font-medium mb-1 uppercase tracking-wider">Level Air</p>
                                        <div class="flex items-baseline gap-1">
                                            <span class="text-5xl font-black drop-shadow-sm" id="ai_level_air">--</span>
                                            <span class="text-xl font-bold text-white/70">%</span>
                                        </div>
                                        <p class="text-sm font-bold mt-1 px-2 py-0.5 bg-white/20 rounded inline-block" id="ai_status_keamanan">Memuat...</p>
                                    </div>
                                    <div class="text-right flex flex-col items-center">
                                        <p class="text-white/80 text-xs font-medium mb-2 uppercase tracking-wider">Risk Score</p>
                                        <div class="w-16 h-16 rounded-full border-4 border-white/30 flex items-center justify-center relative bg-white/10 backdrop-blur-md shadow-inner">
                                            <span class="text-xl font-black drop-shadow-sm" id="ai_risk_score">--</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>