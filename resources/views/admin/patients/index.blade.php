<x-layouts.admin>
    <x-slot:pageHeader>Manajemen Data Pasien & Pelayanan</x-slot:pageHeader>
    <x-slot:pageSubheader>Daftar seluruh pasien pelayanan KB, pencarian, dan pengelolaan data</x-slot:pageSubheader>

    <div class="space-y-6">
        <!-- Filter & Search Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
            <form method="GET" action="{{ route('admin.patients.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-3">
                <!-- Search keyword -->
                <div class="lg:col-span-2">
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Cari Nama / NIK / No. Reg</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Ketik nama atau NIK..." class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-1 focus:ring-teal-500">
                </div>

                <!-- Layanan KB -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Jenis Layanan</label>
                    <select name="service_id" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:border-teal-600 bg-white">
                        <option value="">Semua Layanan</option>
                        @foreach($services as $srv)
                            <option value="{{ $srv->id }}" {{ ($filters['service_id'] ?? '') == $srv->id ? 'selected' : '' }}>{{ $srv->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Status</label>
                    <select name="status" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:border-teal-600 bg-white">
                        <option value="">Semua Status</option>
                        <option value="menunggu" {{ ($filters['status'] ?? '') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="dilayani" {{ ($filters['status'] ?? '') == 'dilayani' ? 'selected' : '' }}>Dilayani</option>
                        <option value="selesai" {{ ($filters['status'] ?? '') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="batal" {{ ($filters['status'] ?? '') == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                </div>

                <!-- Tanggal Pelayanan -->
                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Tanggal Mulai</label>
                    <input type="date" name="start_date" value="{{ $filters['start_date'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:border-teal-600">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Tanggal Akhir</label>
                    <input type="date" name="end_date" value="{{ $filters['end_date'] ?? '' }}" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 focus:border-teal-600">
                </div>

                <div class="sm:col-span-2 lg:col-span-6 flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <a href="{{ route('admin.patients.index') }}" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                        Reset Filter
                    </a>
                    <button type="submit" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-xs transition-colors">
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Patients Data Table -->
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold text-slate-500 uppercase">Total Data Pasien</span>
                    <h3 class="text-sm font-extrabold text-slate-900">{{ $patients->total() }} Pasien Ditemukan</h3>
                </div>

                <a href="{{ route('pelayanan.register') }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold text-teal-700 bg-teal-50 hover:bg-teal-100 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Pasien Baru
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <tr>
                            <th class="py-3 px-4">No. Registrasi</th>
                            <th class="py-3 px-4">Nama Lengkap Pasien</th>
                            <th class="py-3 px-4">Nama Suami</th>
                            <th class="py-3 px-4">NIK</th>
                            <th class="py-3 px-4">Layanan KB</th>
                            <th class="py-3 px-4">Tgl Pelayanan</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-center">Aksi Cepat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($patients as $patient)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-3.5 px-4 font-mono font-bold text-teal-800">
                                    {{ $patient->registration_number }}
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">
                                    {{ $patient->patient_name }}
                                </td>
                                <td class="py-3.5 px-4 text-slate-600">
                                    {{ $patient->husband_name }}
                                </td>
                                <td class="py-3.5 px-4 font-mono text-slate-700">
                                    {{ $patient->nik }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <span class="font-semibold text-slate-800 block">{{ $patient->kbService?->name }}</span>
                                    <span class="text-[10px] text-slate-400">{{ $patient->kb_history }}</span>
                                </td>
                                <td class="py-3.5 px-4 text-slate-700">
                                    {{ $patient->service_date ? $patient->service_date->format('d/m/Y') : '-' }}
                                </td>
                                <td class="py-3.5 px-4">
                                    <form method="POST" action="{{ route('admin.patients.status', $patient->id) }}" class="inline-block">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="text-[11px] font-bold rounded-lg border-0 py-1 px-2 cursor-pointer {{ $patient->status == 'selesai' ? 'bg-emerald-100 text-emerald-800' : ($patient->status == 'dilayani' ? 'bg-blue-100 text-blue-800' : ($patient->status == 'batal' ? 'bg-rose-100 text-rose-800' : 'bg-amber-100 text-amber-800')) }}">
                                            <option value="menunggu" {{ $patient->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="dilayani" {{ $patient->status == 'dilayani' ? 'selected' : '' }}>Dilayani</option>
                                            <option value="selesai" {{ $patient->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="batal" {{ $patient->status == 'batal' ? 'selected' : '' }}>Batal</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="py-3.5 px-4 text-center">
                                    <div class="inline-flex items-center gap-1.5">
                                        <a href="{{ route('admin.patients.show', $patient->id) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-teal-50 hover:text-teal-700 text-slate-600 transition-colors" title="Lihat Detail">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>

                                        <a href="{{ route('admin.patients.edit', $patient->id) }}" class="p-1.5 rounded-lg bg-slate-100 hover:bg-blue-50 hover:text-blue-700 text-slate-600 transition-colors" title="Ubah Data">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>

                                        <a href="{{ route('pelayanan.print', $patient->registration_number) }}" target="_blank" class="p-1.5 rounded-lg bg-slate-100 hover:bg-emerald-50 hover:text-emerald-700 text-slate-600 transition-colors" title="Cetak Bukti">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                        </a>

                                        <form method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-1.5 rounded-lg bg-slate-100 hover:bg-rose-50 hover:text-rose-700 text-slate-600 transition-colors" title="Hapus Data">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-8 text-center text-slate-400">
                                    Tidak ada data pasien yang sesuai dengan filter pencarian.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($patients->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $patients->links() }}
                </div>
            @endif
        </div>
    </div>
</x-layouts.admin>
