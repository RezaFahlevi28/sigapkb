<x-layouts.app>
    <x-slot:title>SIGAP KB - Sistem Informasi & Pencatatan Pelayanan KB</x-slot:title>

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-12 pb-20 lg:pt-20 lg:pb-28 bg-linear-to-b from-teal-50/60 via-white to-slate-50">
        <div class="absolute inset-0 -z-10 opacity-30 bg-[radial-gradient(#0d9488_1px,transparent_1px)] [background-size:24px_24px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left text -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-slate-900 tracking-tight leading-[1.15]">
                        Pendaftaran & Informasi <span class="bg-clip-text text-transparent bg-linear-to-r from-teal-600 via-emerald-600 to-teal-800">Pelayanan KB</span> Jadi Lebih Mudah
                    </h1>

                    <p class="text-base sm:text-lg text-slate-600 max-w-2xl leading-relaxed mx-auto lg:mx-0">
                        Pindai QR Code menggunakan ponsel Anda, kenali berbagai metode kontrasepsi aman (IUD, Implan, Suntik, Pil, Kondom), dan lengkapi pendaftaran tanpa perlu antre lama di loket.
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('pelayanan.register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-4 rounded-2xl text-base font-bold text-white bg-linear-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 shadow-lg shadow-teal-600/30 hover:scale-[1.02] active:scale-[0.98] transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            Daftar Pelayanan KB Sekarang
                        </a>

                        <a href="{{ route('pelayanan.check') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-4 rounded-2xl text-base font-semibold text-slate-700 bg-white hover:bg-slate-50 border border-slate-300 shadow-xs hover:border-slate-400 transition-colors">
                            <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            Cek Bukti Pendaftaran
                        </a>
                    </div>

                    <!-- Trust counters -->
                    <div class="pt-8 border-t border-slate-200/80 grid grid-cols-3 gap-4 max-w-lg mx-auto lg:mx-0">
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-700">{{ $totalServices }}</div>
                            <div class="text-xs text-slate-500 font-medium">Metode Kontrasepsi</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-700">{{ $servedPatientsCount }}+</div>
                            <div class="text-xs text-slate-500 font-medium">Pasien Terlayani</div>
                        </div>
                        <div class="text-center lg:text-left">
                            <div class="text-2xl sm:text-3xl font-extrabold text-teal-700">100%</div>
                            <div class="text-xs text-slate-500 font-medium">Privasi Terjaga</div>
                        </div>
                    </div>
                </div>

                <!-- Right visual card -->
                <div class="lg:col-span-5">
                    <div class="relative mx-auto max-w-md lg:max-w-none">
                        <!-- Glow behind -->
                        <div class="absolute -inset-2 bg-linear-to-r from-teal-400 to-emerald-400 rounded-3xl blur-2xl opacity-30"></div>

                        <div class="relative bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-8 shadow-xl space-y-6">
                            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-700 flex items-center justify-center font-bold">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                    </div>
                                    <div>
                                        <h2 class="text-sm font-bold text-slate-900">Akses QR Code Cepat</h2>
                                        <p class="text-xs text-slate-500">Scan via kamera handphone</p>
                                    </div>
                                </div>
                                <span class="text-[11px] font-semibold px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800">Responsif HP</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 flex items-center gap-4">
                                <div class="w-20 h-20 bg-white p-1 rounded-xl shadow-xs border border-slate-200 shrink-0 flex items-center justify-center">
                                    <!-- Mini SVG QR Code representation -->
                                    <svg class="w-full h-full text-slate-800" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M2 2h8v8H2V2zm2 2v4h4V4H4zm10-2h8v8h-8V2zm2 2v4h4V4h-4zM2 14h8v8H2v-8zm2 2v4h4v-4H4zm14 2h2v4h-2v-4zm-4-4h2v2h-2v-2zm2 2h2v2h-2v-2zm2-2h4v2h-4v-2zm0 6h4v2h-4v-2zm-4 0h2v2h-2v-2z"/>
                                    </svg>
                                </div>
                                <div class="text-xs text-slate-600 space-y-1">
                                    <p class="font-semibold text-slate-800">Petunjuk Pasien di Faskes:</p>
                                    <p>1. Buka kamera HP & arahkan ke kode QR.</p>
                                    <p>2. Sentuh link notifikasi yang muncul.</p>
                                    <p>3. Pilih jenis KB & isi data Anda.</p>
                                </div>
                            </div>

                            <div class="space-y-3 pt-2">
                                <div class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Layanan Tersedia Hari Ini</div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($services as $service)
                                        <a href="{{ route('pelayanan.register', ['service' => $service->slug]) }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-700 hover:bg-teal-50 hover:text-teal-700 hover:border-teal-200 border border-slate-200/60 transition-colors">
                                            <span class="w-1.5 h-1.5 rounded-full bg-teal-500"></span>
                                            {{ $service->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>

                            <a href="{{ route('pelayanan.register') }}" class="block w-full py-3 text-center text-xs font-bold text-teal-700 bg-teal-50 hover:bg-teal-100 rounded-xl transition-colors">
                                Isi Formulir Tanpa Scan &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3 Langkah Alur Pelayanan -->
    <section class="py-16 bg-white border-y border-slate-200/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold tracking-wider text-teal-600 uppercase">Mudah & Cepat</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">3 Langkah Alur Pelayanan KB</h2>
                <p class="text-sm text-slate-600 mt-2">Didesain praktis agar pasien tidak bingung saat berkunjung ke fasilitas kesehatan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div class="relative p-6 sm:p-8 rounded-3xl bg-slate-50 border border-slate-200/70 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center text-lg font-extrabold mb-6 shadow-md shadow-teal-600/20">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Pindai QR / Buka Link</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Pindai QR Code yang terpasang di ruang tunggu faskes atau akses link formulir langsung dari ponsel pintar Anda.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative p-6 sm:p-8 rounded-3xl bg-slate-50 border border-slate-200/70 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-600 text-white flex items-center justify-center text-lg font-extrabold mb-6 shadow-md shadow-emerald-600/20">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Pilih Layanan & Isi Data</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Pilih jenis kontrasepsi yang diinginkan (IUD, Implan, Suntik, Pil, atau Kondom), kemudian masukkan nama, NIK, dan alamat.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative p-6 sm:p-8 rounded-3xl bg-slate-50 border border-slate-200/70 hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-2xl bg-teal-700 text-white flex items-center justify-center text-lg font-extrabold mb-6 shadow-md shadow-teal-700/20">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Dapatkan Bukti & Pelayanan</h3>
                    <p class="text-sm text-slate-600 leading-relaxed">
                        Simpan kartu pendaftaran digital / nomor registrasi. Tunjukkan kepada bidan/dokter untuk tindakan medis secara cepat.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog 5 Layanan KB -->
    <section class="py-16 sm:py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-bold tracking-wider text-teal-600 uppercase">Pilihan Kontrasepsi</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Daftar Layanan KB Yang Tersedia</h2>
                    <p class="text-sm text-slate-600 mt-1 max-w-xl">Pahami keunggulan dan jangka waktu masing-masing metode kontrasepsi sebelum memilih.</p>
                </div>
                <a href="{{ route('services.index') }}" class="inline-flex items-center gap-1.5 text-sm font-bold text-teal-700 hover:text-teal-800 transition-colors">
                    Pelajari Semua Rincian &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                    <div class="bg-white rounded-3xl border border-slate-200/80 p-6 flex flex-col justify-between hover:shadow-lg hover:border-teal-300 transition-all duration-200 group">
                        <div class="space-y-4">
                            <!-- Category Badge -->
                            <div class="flex items-center justify-between">
                                <span class="text-[11px] font-semibold px-2.5 py-1 rounded-full bg-teal-50 text-teal-800 border border-teal-100">
                                    {{ $service->category }}
                                </span>
                                @if($service->effectiveness)
                                    <span class="text-[11px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-md">
                                        {{ $service->effectiveness }}
                                    </span>
                                @endif
                            </div>

                            <!-- Name -->
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 group-hover:text-teal-700 transition-colors">
                                    {{ $service->name }}
                                </h3>
                                @if($service->duration)
                                    <div class="flex items-center gap-1.5 text-xs text-slate-500 mt-1">
                                        <svg class="w-3.5 h-3.5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Durasi: <span class="font-medium text-slate-700">{{ $service->duration }}</span>
                                    </div>
                                @endif
                            </div>

                            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3">
                                {{ $service->short_description }}
                            </p>

                            @if($service->advantages && is_array($service->advantages))
                                <div class="pt-2 border-t border-slate-100 space-y-1.5">
                                    <div class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Kelebihan Utama:</div>
                                    <ul class="text-xs text-slate-600 space-y-1">
                                        @foreach(array_slice($service->advantages, 0, 2) as $adv)
                                            <li class="flex items-start gap-1.5">
                                                <svg class="w-3.5 h-3.5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                <span>{{ $adv }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <!-- CTA -->
                        <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between gap-3">
                            <a href="{{ route('services.index') }}#{{ $service->slug }}" class="text-xs font-semibold text-slate-600 hover:text-teal-700">
                                Rincian &rarr;
                            </a>
                            <a href="{{ route('pelayanan.register', ['service' => $service->slug]) }}" class="inline-flex items-center gap-1 px-4 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-xs transition-colors">
                                Pilih Layanan Ini
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Banner Ajakan Pendaftaran -->
    <section class="py-16 bg-linear-to-r from-teal-700 via-teal-800 to-emerald-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight max-w-2xl mx-auto">
                Rencanakan Masa Depan Keluarga Anda Bersama Fasilitas Pelayanan KB
            </h2>
            <p class="text-sm sm:text-base text-teal-100 max-w-xl mx-auto">
                Konsultasikan kebutuhan kontrasepsi Anda dengan tenaga kesehatan terpercaya kami. Seluruh proses pendaftaran cepat, rapi, dan rahasia terjamin.
            </p>
            <div class="pt-2 flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('pelayanan.register') }}" class="w-full sm:w-auto px-8 py-4 rounded-2xl text-base font-bold text-teal-900 bg-white hover:bg-teal-50 shadow-lg hover:scale-105 transition-all">
                    Daftar Formulir Sekarang
                </a>
                <a href="{{ route('services.index') }}" class="w-full sm:w-auto px-6 py-4 rounded-2xl text-base font-semibold text-white bg-teal-900/40 hover:bg-teal-900/60 border border-teal-500/40 transition-colors">
                    Baca Informasi KB Lengkap
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>
