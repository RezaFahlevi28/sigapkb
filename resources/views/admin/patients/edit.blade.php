<x-layouts.admin>
    <x-slot:pageHeader>Ubah Data Pasien</x-slot:pageHeader>
    <x-slot:pageSubheader>No. Registrasi: {{ $patient->registration_number }}</x-slot:pageSubheader>

    <div class="max-w-4xl space-y-6">
        <a href="{{ route('admin.patients.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-600 hover:text-slate-900 bg-white px-3.5 py-2 rounded-xl border border-slate-200">
            &larr; Batal & Kembali ke Daftar
        </a>

        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 sm:p-8">
            <form method="POST" action="{{ route('admin.patients.update', $patient->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="border-b border-slate-100 pb-4">
                    <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider text-teal-700">Form Koreksi / Perubahan Data Pasien</h2>
                    <p class="text-xs text-slate-500">Perbaiki kekeliruan nama, NIK, tanggal lahir, atau pilihan metode pelayanan sesuai berkas fisik pasien.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- Nama Lengkap Pasien -->
                    <div>
                        <label for="patient_name" class="block text-xs font-bold text-slate-700 mb-1">
                            Nama Lengkap Pasien <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name', $patient->patient_name) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('patient_name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nama Suami -->
                    <div>
                        <label for="husband_name" class="block text-xs font-bold text-slate-700 mb-1">
                            Nama Suami <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" id="husband_name" name="husband_name" value="{{ old('husband_name', $patient->husband_name) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('husband_name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- NIK -->
                    <div>
                        <label for="nik" class="block text-xs font-bold text-slate-700 mb-1">
                            NIK Pasien (16 Digit) <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik', $patient->nik) }}" maxlength="16" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 font-mono text-sm">
                        @error('nik') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="birth_date" class="block text-xs font-bold text-slate-700 mb-1">
                            Tanggal Lahir Pasien <span class="text-rose-500">*</span>
                        </label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $patient->birth_date ? $patient->birth_date->format('Y-m-d') : '') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('birth_date') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Nomor HP -->
                    <div>
                        <label for="phone_number" class="block text-xs font-bold text-slate-700 mb-1">
                            Nomor Handphone / WA
                        </label>
                        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $patient->phone_number) }}" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('phone_number') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Layanan KB -->
                    <div>
                        <label for="kb_service_id" class="block text-xs font-bold text-slate-700 mb-1">
                            Jenis Layanan KB <span class="text-rose-500">*</span>
                        </label>
                        <select id="kb_service_id" name="kb_service_id" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm bg-white">
                            @foreach($services as $srv)
                                <option value="{{ $srv->id }}" {{ old('kb_service_id', $patient->kb_service_id) == $srv->id ? 'selected' : '' }}>
                                    {{ $srv->name }} ({{ $srv->category }})
                                </option>
                            @endforeach
                        </select>
                        @error('kb_service_id') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Tanggal Pelayanan -->
                    <div>
                        <label for="service_date" class="block text-xs font-bold text-slate-700 mb-1">
                            Tanggal Pelayanan <span class="text-rose-500">*</span>
                        </label>
                        <input type="date" id="service_date" name="service_date" value="{{ old('service_date', $patient->service_date ? $patient->service_date->format('Y-m-d') : '') }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('service_date') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Riwayat KB -->
                    <div>
                        <label for="kb_history" class="block text-xs font-bold text-slate-700 mb-1">
                            Riwayat KB <span class="text-rose-500">*</span>
                        </label>
                        <select id="kb_history" name="kb_history" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm bg-white">
                            <option value="Peserta Baru" {{ old('kb_history', $patient->kb_history) == 'Peserta Baru' ? 'selected' : '' }}>Peserta Baru</option>
                            <option value="Peserta Ulangan" {{ old('kb_history', $patient->kb_history) == 'Peserta Ulangan' ? 'selected' : '' }}>Peserta Ulangan</option>
                            <option value="Ganti Cara" {{ old('kb_history', $patient->kb_history) == 'Ganti Cara' ? 'selected' : '' }}>Ganti Cara</option>
                        </select>
                        @error('kb_history') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Status Pelayanan -->
                    <div>
                        <label for="status" class="block text-xs font-bold text-slate-700 mb-1">
                            Status Pelayanan <span class="text-rose-500">*</span>
                        </label>
                        <select id="status" name="status" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm bg-white">
                            <option value="menunggu" {{ old('status', $patient->status) == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="dilayani" {{ old('status', $patient->status) == 'dilayani' ? 'selected' : '' }}>Dilayani</option>
                            <option value="selesai" {{ old('status', $patient->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="batal" {{ old('status', $patient->status) == 'batal' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                        @error('status') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="sm:col-span-2">
                        <label for="address" class="block text-xs font-bold text-slate-700 mb-1">
                            Alamat Domisili Pasien <span class="text-rose-500">*</span>
                        </label>
                        <textarea id="address" name="address" rows="3" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">{{ old('address', $patient->address) }}</textarea>
                        @error('address') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <!-- Catatan Tambahan -->
                    <div class="sm:col-span-2">
                        <label for="notes" class="block text-xs font-bold text-slate-700 mb-1">
                            Catatan Medis Tambahan
                        </label>
                        <textarea id="notes" name="notes" rows="2" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">{{ old('notes', $patient->notes) }}</textarea>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.patients.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-md transition-colors">
                        Simpan Perubahan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
