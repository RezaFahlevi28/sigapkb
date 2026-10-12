<x-layouts.app>
    <x-slot:title>Cek Bukti Pendaftaran KB - SIGAP KB</x-slot:title>

    <div class="py-12 sm:py-20 bg-slate-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Header -->
            <div class="text-center space-y-2">
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider">Cek Status & Bukti Pendaftaran</span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900">Lacak Pendaftaran Pasien</h1>
                <p class="text-sm text-slate-600 max-w-lg mx-auto">
                    Masukkan Nomor Registrasi (contoh: <span class="font-mono font-semibold">KB-20261012-0001</span>) atau 16 digit NIK Anda untuk melihat data dan mencetak ulang kartu bukti pendaftaran.
                </p>
            </div>

            <!-- Search Bar Card -->
            <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-lg">
                <form method="GET" action="{{ route('pelayanan.check') }}" class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="search" value="{{ $query ?? '' }}" required placeholder="Ketik Nomor Registrasi atau NIK Pasien..." class="w-full pl-11 pr-4 py-3.5 rounded-2xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm font-medium transition-colors">
                    </div>
                    <button type="submit" class="px-7 py-3.5 rounded-2xl font-bold text-sm text-white bg-teal-600 hover:bg-teal-700 shadow-md shadow-teal-600/20 transition-all shrink-0">
                        Cari Bukti
                    </button>
                </form>
            </div>

            <!-- Search Results -->
            @if(isset($searched) && $searched)
                <div class="space-y-4">
                    <h2 class="text-sm font-bold text-slate-700 uppercase tracking-wider">Hasil Pencarian untuk: <span class="font-mono text-teal-700 font-bold">"{{ $query }}"</span></h2>

                    @if($registrations->isEmpty())
                        <div class="bg-white rounded-3xl border border-slate-200 p-8 text-center space-y-3">
                            <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-slate-800">Data Pendaftaran Tidak Ditemukan</h3>
                            <p class="text-xs text-slate-500 max-w-sm mx-auto">
                                Pastikan nomor registrasi atau NIK yang Anda masukkan sudah benar dan sesuai saat pendaftaran awal.
                            </p>
                            <a href="{{ route('pelayanan.register') }}" class="inline-block mt-2 px-5 py-2.5 rounded-xl bg-teal-50 text-teal-700 font-bold text-xs hover:bg-teal-100 transition-colors">
                                Daftar Pasien Baru &rarr;
                            </a>
                        </div>
                    @else
                        <div class="space-y-4">
                            @foreach($registrations as $reg)
                                <div class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <span class="font-mono font-bold text-teal-800 text-base">{{ $reg->registration_number }}</span>
                                            <span class="px-2 py-0.5 rounded-full text-[11px] font-semibold {{ $reg->status == 'selesai' ? 'bg-emerald-100 text-emerald-800' : ($reg->status == 'dilayani' ? 'bg-blue-100 text-blue-800' : ($reg->status == 'batal' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800')) }}">
                                                {{ ucfirst($reg->status) }}
                                            </span>
                                        </div>
                                        <div class="text-sm font-bold text-slate-900">{{ $reg->patient_name }} (Suami: {{ $reg->husband_name }})</div>
                                        <div class="text-xs text-slate-500">
                                            Layanan: <strong class="text-slate-700">{{ $reg->kbService?->name }}</strong> &bull; Rencana: {{ $reg->service_date ? $reg->service_date->format('d M Y') : '-' }}
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2 shrink-0">
                                        <a href="{{ route('pelayanan.success', $reg->registration_number) }}" class="px-4 py-2 rounded-xl text-xs font-bold text-teal-700 bg-teal-50 hover:bg-teal-100 transition-colors">
                                            Lihat Kartu &rarr;
                                        </a>
                                        <a href="{{ route('pelayanan.print', $reg->registration_number) }}" target="_blank" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 transition-colors">
                                            Cetak
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
