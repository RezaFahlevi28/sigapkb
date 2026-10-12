<x-layouts.admin>
    <x-slot:pageHeader>Laporan & Rekapitulasi Pelayanan</x-slot:pageHeader>
    <x-slot:pageSubheader>Laporan berkala data pelayanan KB per bulan dan tahun</x-slot:pageSubheader>

    <div class="space-y-6">
        <!-- Filter Periode & Tombol Ekspor Excel -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <form method="GET" action="{{ route('admin.reports.index') }}" class="flex flex-wrap items-center gap-3">
                <!-- Bulan -->
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase mb-0.5">Pilih Bulan</label>
                    <select name="month" class="px-3 py-2 rounded-xl border border-slate-300 text-xs font-semibold bg-white focus:border-teal-600">
                        @foreach(range(1, 12) as $m)
                            @php
                                $mName = \Illuminate\Support\Carbon::createFromDate(2026, $m, 1)->translatedFormat('F');
                            @endphp
                            <option value="{{ $m }}" {{ $selectedMonth == $m ? 'selected' : '' }}>{{ $mName }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tahun -->
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase mb-0.5">Pilih Tahun</label>
                    <select name="year" class="px-3 py-2 rounded-xl border border-slate-300 text-xs font-semibold bg-white focus:border-teal-600">
                        @foreach($years as $yr)
                            <option value="{{ $yr }}" {{ $selectedYear == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Layanan (Opsional) -->
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase mb-0.5">Filter Layanan</label>
                    <select name="service_id" class="px-3 py-2 rounded-xl border border-slate-300 text-xs font-semibold bg-white focus:border-teal-600">
                        <option value="">Semua Layanan</option>
                        @foreach($allServices as $srv)
                            <option value="{{ $srv->id }}" {{ $selectedServiceId == $srv->id ? 'selected' : '' }}>{{ $srv->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="self-end">
                    <button type="submit" class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-slate-800 hover:bg-slate-900 transition-colors">
                        Tampilkan Rekap
                    </button>
                </div>
            </form>

            <!-- Ekspor ke Excel -->
            <div class="flex items-center gap-2 self-start lg:self-end">
                <a href="{{ route('admin.reports.export', ['month' => $selectedMonth, 'year' => $selectedYear, 'service_id' => $selectedServiceId]) }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow-sm transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    Ekspor Laporan ke Excel (.CSV)
                </a>
            </div>
        </div>

        <!-- 3 Ringkasan Periode Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Pelayanan Periode Ini</span>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $totalInPeriod }} Pasien</div>
                <div class="text-[11px] text-slate-500 mt-1">Bulan {{ \Illuminate\Support\Carbon::createFromDate($selectedYear, $selectedMonth, 1)->translatedFormat('F Y') }}</div>
            </div>

            <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pelayanan Selesai</span>
                <div class="text-2xl font-black text-emerald-700 mt-1">{{ $completedInPeriod }} Pasien</div>
                <div class="text-[11px] text-slate-500 mt-1">Telah mendapatkan tindakan medis</div>
            </div>

            <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-xs">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Menunggu / Proses</span>
                <div class="text-2xl font-black text-amber-700 mt-1">{{ $pendingInPeriod }} Pasien</div>
                <div class="text-[11px] text-slate-500 mt-1">Menunggu panggilan atau reservasi</div>
            </div>
        </div>

        <!-- Ringkasan Per Metode Kontrasepsi -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4">Rekapitulasi Berdasarkan Jenis Layanan KB (Bulan {{ \Illuminate\Support\Carbon::createFromDate($selectedYear, $selectedMonth, 1)->translatedFormat('F Y') }})</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                @foreach($servicesSummary as $srv)
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/70">
                        <div class="text-xs font-bold text-slate-800">{{ $srv->name }}</div>
                        <div class="text-[10px] text-slate-500">{{ $srv->category }}</div>
                        <div class="mt-2 text-xl font-black text-teal-800">{{ $srv->total_in_period }} <span class="text-xs font-normal text-slate-500">pasien</span></div>
                        <div class="text-[10px] text-emerald-700 font-semibold mt-0.5">Selesai: {{ $srv->completed_in_period }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tabel Detail Pasien Periode Ini -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-900">Rincian Data Pasien Terdaftar</h3>
                    <p class="text-xs text-slate-500">Data pendaftaran dalam periode yang dipilih</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <tr>
                            <th class="py-3 px-4">No.</th>
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Tgl Pelayanan</th>
                            <th class="py-3 px-4">Nama Pasien</th>
                            <th class="py-3 px-4">Nama Suami</th>
                            <th class="py-3 px-4">NIK</th>
                            <th class="py-3 px-4">Layanan KB</th>
                            <th class="py-3 px-4">Riwayat</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($records as $index => $item)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-3 px-4 text-slate-400">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 font-mono font-bold text-teal-800">{{ $item->registration_number }}</td>
                                <td class="py-3 px-4 text-slate-700">{{ $item->service_date ? $item->service_date->format('d/m/Y') : '-' }}</td>
                                <td class="py-3 px-4 font-bold text-slate-900">{{ $item->patient_name }}</td>
                                <td class="py-3 px-4 text-slate-600">{{ $item->husband_name }}</td>
                                <td class="py-3 px-4 font-mono text-slate-700">{{ $item->nik }}</td>
                                <td class="py-3 px-4 font-semibold text-slate-800">{{ $item->kbService?->name }}</td>
                                <td class="py-3 px-4 text-slate-600">{{ $item->kb_history }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold uppercase {{ $item->status == 'selesai' ? 'bg-emerald-100 text-emerald-800' : ($item->status == 'dilayani' ? 'bg-blue-100 text-blue-800' : ($item->status == 'batal' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="py-8 text-center text-slate-400">
                                    Tidak ada data pelayanan KB pada periode bulan dan tahun ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
