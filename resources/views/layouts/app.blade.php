<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'SIGAP KB - Sistem Informasi & Pencatatan Pelayanan KB' }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo sigapkb.png') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-full font-sans text-slate-800 antialiased selection:bg-teal-500 selection:text-white">

    <!-- Navbar -->
    <header class="sticky top-0 z-40 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand / Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('img/logo sigapkb.png') }}" alt="Logo SIGAP KB" class="w-11 h-11 object-contain group-hover:scale-105 transition-transform duration-200">
                    <div>
                        <div class="flex items-center gap-1.5">
                            <span class="text-xl font-bold tracking-tight text-slate-900 group-hover:text-teal-700 transition-colors">SIGAP <span class="text-teal-600">KB</span></span>
                            <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full bg-teal-100 text-teal-800 tracking-wide uppercase">Layanan KB</span>
                        </div>
                        <p class="text-xs text-slate-500">Pencatatan & Pelayanan Kontrasepsi</p>
                    </div>
                </a>

                <!-- Desktop Nav -->
                <nav class="hidden md:flex items-center gap-1 text-sm font-medium">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-teal-700 bg-teal-50 font-semibold' : 'text-slate-600 hover:text-teal-700 hover:bg-slate-100' }}">
                        Beranda
                    </a>
                    <a href="{{ route('services.index') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('services.index') ? 'text-teal-700 bg-teal-50 font-semibold' : 'text-slate-600 hover:text-teal-700 hover:bg-slate-100' }}">
                        Informasi Layanan KB
                    </a>
                    <a href="{{ route('pelayanan.register') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('pelayanan.register') ? 'text-teal-700 bg-teal-50 font-semibold' : 'text-slate-600 hover:text-teal-700 hover:bg-slate-100' }}">
                        Formulir Pendaftaran
                    </a>
                    <a href="{{ route('pelayanan.check') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('pelayanan.check') ? 'text-teal-700 bg-teal-50 font-semibold' : 'text-slate-600 hover:text-teal-700 hover:bg-slate-100' }}">
                        Cek Bukti Pendaftaran
                    </a>
                </nav>

                <!-- Actions -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-semibold text-teal-700 bg-teal-50 border border-teal-200 hover:bg-teal-100 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            Panel Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-sm font-medium text-slate-600 hover:text-teal-700 hover:bg-slate-100 transition-colors">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                            Petugas
                        </a>
                    @endauth

                    <a href="{{ route('pelayanan.register') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-linear-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 shadow-md shadow-teal-600/20 hover:shadow-lg hover:shadow-teal-600/30 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Daftar Pasien
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" class="md:hidden inline-flex items-center justify-center p-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-hidden">
                    <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-2 shadow-xl">
            <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('home') ? 'bg-teal-50 text-teal-700 font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                Beranda
            </a>
            <a href="{{ route('services.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('services.index') ? 'bg-teal-50 text-teal-700 font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                Informasi Layanan KB
            </a>
            <a href="{{ route('pelayanan.register') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('pelayanan.register') ? 'bg-teal-50 text-teal-700 font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                Formulir Pendaftaran
            </a>
            <a href="{{ route('pelayanan.check') }}" class="block px-3 py-2.5 rounded-lg text-base font-medium {{ request()->routeIs('pelayanan.check') ? 'bg-teal-50 text-teal-700 font-semibold' : 'text-slate-700 hover:bg-slate-50' }}">
                Cek Bukti Pendaftaran
            </a>

            <div class="pt-4 border-t border-slate-100 flex flex-col gap-2">
                <a href="{{ route('pelayanan.register') }}" class="w-full text-center py-3 px-4 rounded-xl text-base font-semibold text-white bg-teal-600 hover:bg-teal-500 shadow-sm">
                    Daftar Pelayanan KB
                </a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="w-full text-center py-2.5 px-4 rounded-xl text-sm font-semibold text-teal-800 bg-teal-50 hover:bg-teal-100">
                        Panel Admin
                    </a>
                @else
                    <a href="{{ route('login') }}" class="w-full text-center py-2.5 px-4 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-100">
                        Masuk Petugas
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Flash Notifications -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-4">
        @if(session('status'))
            <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 shadow-xs animate-fade-in">
                <svg class="w-5 h-5 text-emerald-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div class="text-sm font-medium">{{ session('status') }}</div>
            </div>
        @endif

        @if($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3 shadow-xs">
                <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <div>
                    <h4 class="text-sm font-semibold text-rose-900">Perhatikan beberapa kesalahan berikut:</h4>
                    <ul class="mt-1 list-disc list-inside text-xs space-y-0.5 text-rose-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>

    <!-- Main Content Area -->
    <main class="flex-1">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 mt-20 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Col 1 -->
                <div class="md:col-span-2 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-lg bg-teal-500 flex items-center justify-center text-white font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
                        </div>
                        <span class="text-xl font-bold text-white tracking-tight">SIGAP <span class="text-teal-400">KB</span></span>
                    </div>
                    <p class="text-sm text-slate-400 max-w-md leading-relaxed">
                        Sistem Informasi dan Pencatatan Pelayanan Keluarga Berencana berbasis digital. Memudahkan pasien mendaftar melalui QR Code ponsel pintar dan memfasilitasi faskes dalam rekapitulasi data akurat.
                    </p>
                    <div class="text-xs text-slate-500">
                        Mendukung program Keluarga Berkualitas BKKBN & Kementerian Kesehatan RI.
                    </div>
                </div>

                <!-- Col 2 -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Layanan Kontrasepsi</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('services.index') }}#iud" class="hover:text-teal-400 transition-colors">IUD (Spiral)</a></li>
                        <li><a href="{{ route('services.index') }}#implan" class="hover:text-teal-400 transition-colors">Implan (Susuk KB)</a></li>
                        <li><a href="{{ route('services.index') }}#suntikan-kb" class="hover:text-teal-400 transition-colors">Suntikan KB (1 & 3 Bulan)</a></li>
                        <li><a href="{{ route('services.index') }}#pil-kb" class="hover:text-teal-400 transition-colors">Pil KB Oral</a></li>
                        <li><a href="{{ route('services.index') }}#kondom" class="hover:text-teal-400 transition-colors">Kondom</a></li>
                    </ul>
                </div>

                <!-- Col 3 -->
                <div>
                    <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Akses Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('pelayanan.register') }}" class="hover:text-teal-400 transition-colors">Formulir Pendaftaran</a></li>
                        <li><a href="{{ route('pelayanan.check') }}" class="hover:text-teal-400 transition-colors">Cek Status Bukti</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition-colors">Login Administrasi</a></li>
                    </ul>
                </div>
            </div>

            <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-500 gap-4">
                <p>&copy; {{ date('Y') }} SIGAP KB. Sistem Informasi dan Pencatatan Pelayanan KB.</p>
                <p>Kenyamanan, Privasi, dan Kesehatan Reproduksi Terjaga.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile menu toggle script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');

            if (btn && menu) {
                btn.addEventListener('click', function () {
                    menu.classList.toggle('hidden');
                    menuIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
