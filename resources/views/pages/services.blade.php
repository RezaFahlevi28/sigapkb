<x-layouts.app>
    <x-slot:title>Informasi & Jenis Layanan KB - SIGAP KB</x-slot:title>

    <div class="bg-teal-900 text-white py-14 sm:py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4 relative">
            <span class="inline-block px-3 py-1 rounded-full bg-teal-800 text-teal-200 text-xs font-semibold tracking-wide uppercase">
                Panduan Edukasi Kontrasepsi
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight">Informasi Lengkap Layanan KB</h1>
            <p class="text-teal-200 max-w-2xl mx-auto text-sm sm:text-base leading-relaxed">
                Pilih metode kontrasepsi yang paling sesuai dengan kondisi kesehatan, rencana kehamilan, dan kenyamanan Anda dan pasangan.
            </p>
        </div>
    </div>

    <!-- Petunjuk Pengisian Formulir Pelayanan Box -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="bg-white rounded-3xl border border-slate-200/90 p-6 sm:p-8 shadow-xl space-y-4">
            <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-800 flex items-center justify-center font-bold">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <h2 class="text-base sm:text-lg font-bold text-slate-900">Petunjuk Pengisian Formulir Pelayanan KB</h2>
                    <p class="text-xs text-slate-500">Perhatikan ketentuan berikut sebelum mengisi formulir pendaftaran:</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs sm:text-sm text-slate-600">
                <div class="flex items-start gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-teal-100 text-teal-800 font-bold flex items-center justify-center shrink-0 text-xs">1</span>
                    <span><strong>Siapkan KTP:</strong> Masukkan 16 digit Nomor Induk Kependudukan (NIK) Anda secara tepat untuk sinkronisasi rekam medis faskes.</span>
                </div>
                <div class="flex items-start gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-teal-100 text-teal-800 font-bold flex items-center justify-center shrink-0 text-xs">2</span>
                    <span><strong>Data Suami:</strong> Tuliskan nama suami sesuai kartu keluarga untuk pencatatan resmi program KB keluarga.</span>
                </div>
                <div class="flex items-start gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-teal-100 text-teal-800 font-bold flex items-center justify-center shrink-0 text-xs">3</span>
                    <span><strong>Pilih Metode KB:</strong> Pilih layanan yang diinginkan. Anda dapat berkonsultasi lebih lanjut dengan bidan saat hari kunjungan.</span>
                </div>
                <div class="flex items-start gap-2.5">
                    <span class="w-5 h-5 rounded-full bg-teal-100 text-teal-800 font-bold flex items-center justify-center shrink-0 text-xs">4</span>
                    <span><strong>Simpan Bukti:</strong> Setelah submit, simpan atau unduh nomor registrasi / QR tiket digital untuk ditunjukkan pada loket pelayanan.</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Masing-masing Layanan KB -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">
        @foreach($services as $service)
            <div id="{{ $service->slug }}" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs p-6 sm:p-10 space-y-6 scroll-mt-28">
                <!-- Header Card -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-teal-100 text-teal-800">
                                {{ $service->category }}
                            </span>
                            @if($service->effectiveness)
                                <span class="text-xs font-bold px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800">
                                    {{ $service->effectiveness }}
                                </span>
                            @endif
                        </div>
                        <h2 class="text-2xl font-extrabold text-slate-900">{{ $service->name }}</h2>
                    </div>

                    <a href="{{ route('pelayanan.register', ['service' => $service->slug]) }}" class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-md shadow-teal-600/20 transition-all shrink-0">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Pilih {{ $service->name }}
                    </a>
                </div>

                <!-- Durasi & Deskripsi -->
                <div class="space-y-3">
                    @if($service->duration)
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-semibold">
                            <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Masa Efektif: <span class="text-slate-900">{{ $service->duration }}</span>
                        </div>
                    @endif

                    <p class="text-sm sm:text-base text-slate-700 leading-relaxed">
                        {{ $service->full_description ?? $service->short_description }}
                    </p>
                </div>

                <!-- Kelebihan & Efek Samping Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <!-- Kelebihan -->
                    <div class="bg-emerald-50/50 rounded-2xl p-5 border border-emerald-100 space-y-3">
                        <div class="flex items-center gap-2 text-emerald-900 font-bold text-sm">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Kelebihan & Keunggulan
                        </div>
                        <ul class="text-xs sm:text-sm text-slate-700 space-y-2">
                            @if($service->advantages && is_array($service->advantages))
                                @foreach($service->advantages as $adv)
                                    <li class="flex items-start gap-2">
                                        <span class="text-emerald-600 font-bold">&check;</span>
                                        <span>{{ $adv }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>Efektif dan aman sesuai rekomendasi medis.</li>
                            @endif
                        </ul>
                    </div>

                    <!-- Efek Samping / Hal yang perlu diperhatikan -->
                    <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200/80 space-y-3">
                        <div class="flex items-center gap-2 text-slate-900 font-bold text-sm">
                            <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                            Hal yang Perlu Diperhatikan
                        </div>
                        <ul class="text-xs sm:text-sm text-slate-600 space-y-2">
                            @if($service->side_effects && is_array($service->side_effects))
                                @foreach($service->side_effects as $se)
                                    <li class="flex items-start gap-2">
                                        <span class="text-amber-600 font-bold">&bull;</span>
                                        <span>{{ $se }}</span>
                                    </li>
                                @endforeach
                            @else
                                <li>Dapat dikonsultasikan kembali bila timbul keluhan setelah pemakaian.</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Petunjuk Prosedur / Tindakan Medis -->
                @if($service->procedure_instructions)
                    <div class="p-4 rounded-2xl bg-teal-50/70 border border-teal-100 text-xs sm:text-sm text-teal-900 flex items-start gap-3">
                        <svg class="w-5 h-5 text-teal-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <span class="font-bold">Petunjuk Pemasangan / Pemakaian:</span>
                            <p class="mt-0.5 text-teal-800 leading-relaxed">{{ $service->procedure_instructions }}</p>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</x-layouts.app>
