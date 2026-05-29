<x-app-layout>
    <div class="py-8 relative min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-20">
            
            @if (session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl flex items-center gap-3 text-sm font-medium shadow-sm animate-[slideDown_0.2s_ease-out]">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-500"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-2xl flex items-center gap-3 text-sm font-medium shadow-sm animate-[slideDown_0.2s_ease-out]">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-500"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                @include('admin.partials.form-upload')

                @include('admin.partials.list-video')
                
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Inisialisasi ikon Lucide secara lokal
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
    
    <script src="{{ asset('js/kelola-video.js') }}"></script>
</x-app-layout>