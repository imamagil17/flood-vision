<x-app-layout>
    <div class="py-8 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-20">
  
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-stretch">
                
                <div class="xl:col-span-1 flex flex-col h-full space-y-8">
                    @include('admin.partials.camera-feed')
                    @include('admin.partials.recent-reports')
                </div>

                <div class="xl:col-span-2 flex flex-col h-full space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 shrink-0">
                        @include('admin.partials.weather-card')
                        @include('admin.partials.ai-prediction-card')
                    </div>
                    
                    <div class="flex-grow flex flex-col h-0 w-full">
                        @include('admin.partials.water-chart')
                    </div>
                </div>
            </div>

            <div class="mt-8">
                @include('admin.partials.news-slider')
            </div>
    </div>

    @include('admin.partials.news-modal')
    @include('admin.partials.chatbot-widget')
    @include('admin.partials.camera-modal')

    <style>
        /* Menyembunyikan scrollbar untuk slider berita */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
    </style>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@2.0.1/dist/chartjs-plugin-annotation.min.js"></script>
    
    <script>
        window.onOpenCvReady = function() {
            console.log('OpenCV.js is ready.');
        };
        // Initialize Icons
        lucide.createIcons();
    </script>
    
    <script src="{{ asset('js/classification.js') }}"></script>
    <script src="{{ asset('js/camera.js') }}"></script>
    <script async src="https://docs.opencv.org/4.8.0/opencv.js" onload="onOpenCvReady();"></script>
    
    <script src="{{ asset('js/dashboard-api.js') }}"></script>
    <script src="{{ asset('js/water-chart.js') }}"></script>
    <script src="{{ asset('js/chatbot.js') }}"></script>
    <script src="{{ asset('js/news-modal.js') }}"></script>
    <script src="{{ asset('js/citizen-reports.js') }}"></script>
</x-app-layout>