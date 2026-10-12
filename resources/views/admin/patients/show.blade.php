<x-layouts.admin>
    <x-slot:pageHeader>Detail Data Pasien</x-slot:pageHeader>
    <x-slot:pageSubheader>No. Registrasi: {{ $patient->registration_number }}</x-slot:pageSubheader>

    <div class="max-w-4xl space-y-6">
        <!-- Back Navigation & Top Actions -->
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.patients.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-600 hover:text-slate-900 bg-white px-3.5 py-2 rounded-xl border border-slate-200 shadow-2xs">
                &larr; Kembali ke Daftar Pasien
            </a>

            <div class="flex items-center gap-2">
                <a href="{{ route('pelayanan.print', $patient->registration_number) }}" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-xs transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Kartu Bukti
                </a>
                <a href="{{ route('admin.patients.edit', $patient->id) }}" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 transition-colors">
                    Edit Data Pasien
                </a>
            </div>
        </div>

        <!-- Detail Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="bg-linear-to-r from-teal-700 to-emerald-700 px-6 py-5 text-white flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold tracking-wider text-teal-200 uppercase">Rekam Registrasi Pasien</span>
                    <h2 class="text-xl font-black">{{ $patient->patient_name }}</h2>
                </div>
                <div class="text-right">
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-white/20 text-white border border-white/30">
                        Status: {{ $patient->status }}
                    </span>
                </div>
            </div>

            <div class="p-6 sm:p-8 space-y-6">
                <!-- Status Quick Update Form -->
                <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="text-xs">
                        <span class="font-bold text-slate-700 block">Status Pelayanan Saat Ini:</span>
                        <span class="text-slate-500">Ubah tahapan pelayanan langsung untuk memperbarui antrian.</span>
                    </div>

                    <form method="POST" action="{{ route('admin.patients.status', $patient->id) }}" class="flex items-center gap-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="text-xs font-bold rounded-xl border border-slate-300 py-2 px-3 bg-white">
                            <option value="menunggu" {{ $patient->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dilayani" {{ $patient->status == 'dilayani' ? 'selected' : '' }}>Sedang Dilayani</option>
                            <option value="selesai" {{ $patient->status == 'selesai' ? 'selected' : '' }}>Pelayanan Selesai</option>
                            <option value="batal" {{ $patient->status == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        <button type="submit" class="px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-slate-800 hover:bg-slate-900 transition-colors">
                            Simpan
                        </button>
                    </form>
                </div>

                <!-- Grid Data Pasien -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs sm:text-sm">
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Nomor Registrasi:</span>
                        <span class="font-mono font-bold text-teal-800 text-base">{{ $patient->registration_number }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">NIK Pasien:</span>
                        <span class="font-mono font-bold text-slate-900 text-base">{{ $patient->nik }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Nama Lengkap Pasien:</span>
                        <span class="font-bold text-slate-900">{{ $patient->patient_name }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Nama Suami:</span>
                        <span class="font-bold text-slate-900">{{ $patient->husband_name }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Tanggal Lahir:</span>
                        <span class="font-medium text-slate-800">{{ $patient->birth_date ? $patient->birth_date->format('d F Y') : '-' }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Nomor Telepon / WhatsApp:</span>
                        <span class="font-medium text-slate-800">{{ $patient->phone_number ?? '-' }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Layanan Kontrasepsi Terpilih:</span>
                        <span class="font-bold text-teal-700 text-base">{{ $patient->kbService?->name }}</span>
                        <span class="text-slate-500 block text-xs">{{ $patient->kbService?->category }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Riwayat KB:</span>
                        <span class="font-bold text-slate-800">{{ $patient->kb_history }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Tanggal Pelayanan:</span>
                        <span class="font-bold text-slate-900">{{ $patient->service_date ? $patient->service_date->format('d F Y') : '-' }}</span>
                    </div>

                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Waktu Pendaftaran Masuk:</span>
                        <span class="font-medium text-slate-800">{{ $patient->created_at->format('d/m/Y H:i') }} WIB</span>
                    </div>

                    <div class="sm:col-span-2 p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                        <span class="text-slate-400 block text-[11px] font-semibold">Alamat Domisili Pasien:</span>
                        <span class="font-medium text-slate-800 leading-relaxed">{{ $patient->address }}</span>
                    </div>

                    @if($patient->notes)
                        <div class="sm:col-span-2 p-4 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                            <span class="text-slate-400 block text-[11px] font-semibold">Catatan Medis / Tambahan:</span>
                            <span class="font-medium text-slate-800">{{ $patient->notes }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
