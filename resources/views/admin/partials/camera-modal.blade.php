    <div id="cameraModal" class="fixed inset-0 z-[60] hidden bg-black/90 backdrop-blur-md flex flex-col items-center justify-center transition-opacity duration-300">
        <button id="closeCameraModal" class="absolute top-6 right-6 p-3 bg-white/10 hover:bg-white/20 text-white rounded-full transition-colors backdrop-blur-md z-[70]">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>
        
        <div class="w-full max-w-5xl px-4 relative flex flex-col items-center">
            <div class="relative w-full aspect-[4/3] md:aspect-video rounded-3xl overflow-hidden shadow-[0_0_50px_rgba(37,99,235,0.2)] border border-white/10 bg-slate-900 ring-1 ring-white/20">
                <video id="videoInput" style="display:none" autoplay playsinline muted></video>
                <canvas id="canvasOutput" class="w-full h-full object-cover"></canvas>
                
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none bg-slate-900" id="cameraPlaceholder">
                    <i data-lucide="loader-2" class="w-12 h-12 text-blue-500 animate-spin mb-4"></i>
                    <p class="text-blue-300 font-medium tracking-widest uppercase text-sm animate-pulse">Initializing OpenCV Tracking...</p>
                </div>
            </div>
            <p class="text-slate-400 text-xs mt-4 uppercase tracking-widest flex items-center gap-2"><i data-lucide="scan" class="w-3 h-3"></i> Canny Edge Analysis Active</p>
        </div>
    </div>
