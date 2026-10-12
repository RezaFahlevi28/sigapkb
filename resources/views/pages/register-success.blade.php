<x-layouts.app>
    <x-slot:title>Pendaftaran Berhasil - {{ $registration->registration_number }}</x-slot:title>

    <div class="py-12 sm:py-20 bg-slate-50">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">

            <!-- Success check badge -->
            <div class="text-center mb-6 space-y-2">
                <div class="w-16 h-16 rounded-3xl bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto shadow-md shadow-emerald-500/20">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Pendaftaran Berhasil Terkirim!</h1>
                <p class="text-sm text-slate-600">Simpan nomor registrasi dan QR Code di bawah untuk ditunjukkan kepada petugas pelayanan.</p>
            </div>

            <!-- Digital Registration Card -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-2xl overflow-hidden">
                <!-- Card Header -->
                <div class="bg-linear-to-r from-teal-700 to-emerald-700 px-6 py-5 text-white flex items-center justify-between">
                    <div>
                        <span class="text-xs uppercase font-bold tracking-wider text-teal-200">Kartu Bukti Pendaftaran KB</span>
                        <div class="text-lg font-extrabold tracking-tight">SIGAP KB INDONESIA</div>
                    </div>
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/30 text-emerald-100 border border-emerald-400/40">
                        {{ ucfirst($registration->status) }}
                    </span>
                </div>

                <!-- Registration Number Banner -->
                <div class="bg-teal-50 px-6 py-4 border-b border-teal-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div>
                        <div class="text-[11px] font-bold text-teal-800 uppercase tracking-wider">Nomor Registrasi Pasien:</div>
                        <div id="reg-number-text" class="text-xl sm:text-2xl font-black text-teal-950 font-mono tracking-tight">
                            {{ $registration->registration_number }}
                        </div>
                    </div>
                    <button type="button" onclick="navigator.clipboard.writeText('{{ $registration->registration_number }}'); alert('Nomor registrasi berhasil disalin!');" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-white border border-teal-200 text-xs font-bold text-teal-700 hover:bg-teal-100 transition-colors shadow-2xs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                        Salin Nomor
                    </button>
                </div>

                <div class="p-6 sm:p-8 space-y-6">
                    <!-- QR Code Display Box -->
                    <div class="flex flex-col items-center justify-center p-6 bg-slate-50 rounded-2xl border border-slate-200/80 text-center">
                        <div class="bg-white p-3 rounded-2xl shadow-sm border border-slate-200 mb-3">
                            <img src="{{ $qrCodeDataUri }}" alt="QR Code Pendaftaran" class="w-44 h-44 object-contain">
                        </div>
                        <p class="text-xs font-semibold text-slate-700">Pindai QR ini di Loket Pelayanan KB</p>
                        <p class="text-[11px] text-slate-400 mt-0.5">Petugas akan langsung memverifikasi data Anda</p>
                    </div>

                    <!-- Detail Data Pasien -->
                    <div class="space-y-3 text-xs sm:text-sm">
                        <div class="text-xs font-bold text-slate-400 uppercase tracking-wider">Ringkasan Data Pasien</div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 p-4 rounded-2xl bg-slate-50/70 border border-slate-100">
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nama Lengkap Pasien:</span>
                                <span class="font-bold text-slate-900 text-sm">{{ $registration->patient_name }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Nama Suami:</span>
                                <span class="font-bold text-slate-900 text-sm">{{ $registration->husband_name }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">NIK:</span>
                                <span class="font-semibold text-slate-800 font-mono">{{ $registration->nik }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Tanggal Lahir:</span>
                                <span class="font-semibold text-slate-800">{{ $registration->birth_date ? $registration->birth_date->format('d F Y') : '-' }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Layanan KB Terpilih:</span>
                                <span class="font-bold text-teal-700">{{ $registration->kbService?->name }}</span>
                            </div>
                            <div>
                                <span class="text-slate-400 block text-[11px]">Rencana Tanggal Pelayanan:</span>
                                <span class="font-semibold text-slate-800">{{ $registration->service_date ? $registration->service_date->format('d F Y') : '-' }}</span>
                            </div>
                            <div class="sm:col-span-2">
                                <span class="text-slate-400 block text-[11px]">Alamat:</span>
                                <span class="font-medium text-slate-700">{{ $registration->address }}</span>
                            </div>
                            @if($registration->notes)
                                <div class="sm:col-span-2">
                                    <span class="text-slate-400 block text-[11px]">Catatan / Keluhan:</span>
                                    <span class="font-medium text-slate-700">{{ $registration->notes }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Petunjuk Datang -->
                    <div class="p-4 rounded-2xl bg-amber-50 border border-amber-200/80 text-amber-900 text-xs flex items-start gap-2.5">
                        <svg class="w-4 h-4 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <div>
                            <span class="font-bold">Langkah Selanjutnya:</span>
                            <p class="mt-0.5 text-amber-800 leading-relaxed">
                                Datanglah ke faskes pada tanggal yang dipilih. Bawa KTP asli dan kartu BPJS/KIS (jika ada). Tunjukkan nomor registrasi ini ke meja pendaftaran KB.
                            </p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('pelayanan.print', $registration->registration_number) }}" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-md transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak Bukti / Simpan PDF
                        </a>

                        <a href="{{ route('home') }}" class="inline-flex items-center justify-center py-3.5 px-4 rounded-xl text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-colors">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>
