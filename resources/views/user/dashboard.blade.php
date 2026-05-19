<x-app-layout>
    <div class="py-8 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-20">
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                
                <!-- KOLOM KIRI (1 Bagian) -->
                <div class="xl:col-span-1 space-y-6 sticky top-6 self-start">
                    @include('user.partials.safety-guide')
                    @include('user.partials.telegram-alert')
                    @include('user.partials.weather-forecast')
                </div>

                <!-- KOLOM KANAN (2 Bagian) -->
                <div class="xl:col-span-2 space-y-8">
                    
                    <!-- Cuaca & AI Prediction -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @include('user.partials.weather-card')
                        @include('user.partials.ai-prediction-card')
                    </div>

                    <!-- Statistik Harian -->
                    @include('user.partials.today-stats')

                    <!-- Grafik Tren Ketinggian Air -->
                    @include('user.partials.water-chart')

                    <!-- Riwayat Peringatan -->
                    @include('user.partials.notification-history')

                    <!-- Form Laporan Warga & Checklist -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                        @include('user.partials.checklist')
                        @include('user.partials.citizen-report-form')
                    </div>

                </div>
            </div>

            <!-- NEWS SECTION -->
            @include('user.partials.news-slider')
        </div>
    </div>

    <!-- MODAL & WIDGETS -->
    @include('user.partials.news-modal')
    @include('user.partials.chatbot-widget')
    @include('user.partials.map-modal')

    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
    </style>
    
    <!-- EXTERNAL DEPENDENCIES -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        window.onOpenCvReady = function() { console.log('OpenCV.js is ready.'); };
        lucide.createIcons();
    </script>
    
    <script src="{{ asset('js/classification.js') }}"></script>
    <script src="{{ asset('js/camera.js') }}"></script>
    <script async src="https://docs.opencv.org/4.8.0/opencv.js" onload="onOpenCvReady();"></script>

    <!-- MODULAR JAVASCRIPT SYSTEM (Separation of Concerns) -->
    <script src="{{ asset('js/dashboard-api.js') }}"></script>
    <script src="{{ asset('js/water-chart.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
    <script src="{{ asset('js/news-modal.js') }}"></script>
    <script src="{{ asset('js/citizen-reports.js') }}"></script>
    <script src="{{ asset('js/user-dashboard-specific.js') }}"></script>
</x-app-layout>