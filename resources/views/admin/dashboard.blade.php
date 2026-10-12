<x-layouts.admin>
    <x-slot:pageHeader>Dashboard Ringkasan Pelayanan</x-slot:pageHeader>
    <x-slot:pageSubheader>Rekapitulasi Pelayanan KB Bulan {{ $currentMonthName }}</x-slot:pageSubheader>

    <div class="space-y-8">
        <!-- 4 Top Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Total Pasien -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Pasien</span>
                    <div class="w-9 h-9 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-slate-900 mt-2">{{ $totalPatients }}</div>
                <div class="text-xs text-slate-500 mt-1">Keseluruhan data tercatat</div>
            </div>

            <!-- Pasien Bulan Ini -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Bulan Berjalan</span>
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-emerald-700 mt-2">{{ $thisMonthPatients }}</div>
                <div class="text-xs text-slate-500 mt-1">Periode {{ $currentMonthName }}</div>
            </div>

            <!-- Pasien Hari Ini -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Kunjungan Hari Ini</span>
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-blue-700 mt-2">{{ $todayPatients }}</div>
                <div class="text-xs text-slate-500 mt-1">Antrean tanggal {{ date('d/m/Y') }}</div>
            </div>

            <!-- Menunggu Pelayanan -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Menunggu Pelayanan</span>
                    <div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </div>
                </div>
                <div class="text-3xl font-extrabold text-amber-700 mt-2">{{ $pendingPatients }}</div>
                <div class="text-xs text-slate-500 mt-1">{{ $completedPatients }} pasien telah selesai</div>
            </div>
        </div>

        <!-- Section: Distribusi Pasien Berdasarkan Jenis Layanan KB -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Jumlah Pasien Berdasarkan Jenis Layanan KB</h2>
                    <p class="text-xs text-slate-500">Distribusi peminat metode kontrasepsi di fasilitas kesehatan</p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.reports.index') }}" class="text-xs font-bold text-teal-700 bg-teal-50 hover:bg-teal-100 px-3 py-1.5 rounded-lg transition-colors">
                        Lihat Laporan Lengkap &rarr;
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                @foreach($services as $service)
                    @php
                        $percentage = $totalPatients > 0 ? round(($service->total_count / $totalPatients) * 100, 1) : 0;
                    @endphp
                    <div class="p-4 rounded-xl border border-slate-200 bg-slate-50/50 flex flex-col justify-between space-y-3">
                        <div>
                            <div class="text-xs font-semibold text-teal-800">{{ $service->name }}</div>
                            <div class="text-[11px] text-slate-400 mt-0.5">{{ $service->category }}</div>
                        </div>

                        <div class="space-y-1.5">
                            <div class="flex items-baseline justify-between">
                                <span class="text-2xl font-black text-slate-900">{{ $service->total_count }}</span>
                                <span class="text-xs font-bold text-teal-600">{{ $percentage }}%</span>
                            </div>

                            <!-- Progress Bar -->
                            <div class="w-full h-2 rounded-full bg-slate-200 overflow-hidden">
                                <div class="h-full bg-teal-600 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <div class="text-[10px] text-slate-500">Bulan ini: <strong>{{ $service->current_month_count }}</strong> pasien</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Section: Pendaftaran Terbaru & Aksi Cepat -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Pendaftaran Pasien Terbaru</h2>
                    <p class="text-xs text-slate-500">Daftar pasien terakhir yang mendaftar melalui QR code atau formulir</p>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.qrcode.index') }}" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition-colors">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                        Cetak Poster QR
                    </a>
                    <a href="{{ route('admin.patients.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-lg text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 transition-colors">
                        Semua Pasien &rarr;
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <tr>
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Nama Pasien / Suami</th>
                            <th class="py-3 px-4">NIK</th>
                            <th class="py-3 px-4">Layanan KB</th>
                            <th class="py-3 px-4">Tgl Pelayanan</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($recentRegistrations as $item)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-3 px-4 font-mono font-bold text-teal-800">
                                    {{ $item->registration_number }}
                                </td>
                                <td class="py-3 px-4">
                                    <div class="font-bold text-slate-900">{{ $item->patient_name }}</div>
                                    <div class="text-[11px] text-slate-500">Suami: {{ $item->husband_name }}</div>
                                </td>
                                <td class="py-3 px-4 font-mono text-slate-600">
                                    {{ $item->nik }}
                                </td>
                                <td class="py-3 px-4 font-semibold text-slate-800">
                                    {{ $item->kbService?->name }}
                                </td>
                                <td class="py-3 px-4 text-slate-600">
                                    {{ $item->service_date ? $item->service_date->format('d/m/Y') : '-' }}
                                </td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $item->status == 'selesai' ? 'bg-emerald-100 text-emerald-800' : ($item->status == 'dilayani' ? 'bg-blue-100 text-blue-800' : ($item->status == 'batal' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-right space-x-1">
                                    <a href="{{ route('admin.patients.show', $item->id) }}" class="p-1 text-slate-500 hover:text-teal-700" title="Detail">
                                        Detail
                                    </a>
                                    &bull;
                                    <a href="{{ route('admin.patients.edit', $item->id) }}" class="p-1 text-slate-500 hover:text-blue-700" title="Edit">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-6 text-center text-slate-400">
                                    Belum ada data pendaftaran pasien.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
