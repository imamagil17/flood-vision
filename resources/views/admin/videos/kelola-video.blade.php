<x-app-layout>
    <div class="py-8 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-20">
            
            <!-- Alert Box untuk Notifikasi Hasil Simulasi YOLO -->
            <div id="simulationAlert" class="hidden mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center gap-3 text-sm font-medium shadow-sm animate-[slideDown_0.2s_ease-out]">
                <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                <span id="simulationAlertText">Video berhasil disimulasikan! Model YOLO mengekstrak ketinggian air sungai secara otomatis.</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- 1. Form Upload Video (Sisi Kiri) -->
                @include('admin.partials.form-upload')

                <!-- 2. List Video Tersimpan (Sisi Kanan) -->
                @include('admin.partials.list-video')
                
            </div>
        </div>
    </div>

    <!-- Panggil Script Logika Eksternal & Pustaka Pendukung -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Inisialisasi ikon Lucide secara lokal
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
    <script src="{{ asset('js/kelola-video.js') }}"></script>
</x-app-layout>