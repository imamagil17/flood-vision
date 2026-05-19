<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Flood-Vision') }} | Sistem Mitigasi Banjir Cerdas</title>

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.5, 0, 0, 1);
        }
        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800 min-h-screen flex flex-col font-[Figtree] relative overflow-x-hidden">

    <!-- Latar Belakang Animasi -->
    <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-blue-400/20 rounded-full blur-[120px] z-0 pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-indigo-300/20 rounded-full blur-[120px] z-0 pointer-events-none"></div>

    <!-- NAVBAR -->
    @include('welcome.partials.navbar')

    <!-- HERO SECTION -->
    @include('welcome.partials.hero-section')

    <!-- LIVE DEMO SECTION -->
    @include('welcome.partials.live-demo')

    <!-- FEATURES SECTION -->
    @include('welcome.partials.features-section')

    <!-- ARCHITECTURE SECTION -->
    @include('welcome.partials.architecture-section')

    <!-- CTA SECTION -->
    @include('welcome.partials.cta-section')

    <!-- PUBLIC NEWS SLIDER -->
    @include('welcome.partials.public-news-slider')

    <!-- NEWS MODAL (Reuse from existing dashboard) -->
    @include('user.partials.news-modal')

    <!-- FOOTER -->
    @include('welcome.partials.main-footer')

    <!-- EXTERNAL JS DEPENDENCIES -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();
    </script>

    <!-- MODULAR JS (Reuse & Khusus Welcome) -->
    <!-- Reuse fungsi modal berita yang sudah dipisahkan di Dashboard -->
    <script src="{{ asset('js/news-modal.js') }}"></script>
    <!-- Fungsi animasi scroll khusus halaman Welcome -->
    <script src="{{ asset('js/welcome-animations.js') }}"></script>

</body>
</html>