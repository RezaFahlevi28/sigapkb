<x-layouts.app>
    <x-slot:title>Formulir Pendaftaran Pelayanan KB - SIGAP KB</x-slot:title>

    <div class="py-10 sm:py-16 bg-slate-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header title -->
            <div class="text-center mb-8 space-y-2">
                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-teal-100 text-teal-800 text-xs font-semibold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Pendaftaran Pasien Online / Scan QR
                </div>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">Formulir Pelayanan KB</h1>
                <p class="text-sm text-slate-600 max-w-xl mx-auto">
                    Silakan isi formulir identitas dan pilih layanan kontrasepsi yang dikehendaki. Data Anda dilindungi kerahasiaannya.
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-3xl border border-slate-200 shadow-xl overflow-hidden">
                <div class="bg-linear-to-r from-teal-600 to-emerald-600 px-6 py-4 text-white flex items-center justify-between">
                    <span class="text-sm font-bold tracking-wide">Data Pasien & Layanan</span>
                    <span class="text-xs bg-white/20 px-2.5 py-0.5 rounded-full font-medium">Langkah 1 dari 1</span>
                </div>

                <form method="POST" action="{{ route('pelayanan.store') }}" class="p-6 sm:p-10 space-y-8">
                    @csrf

                    <!-- 1. Pemilihan Jenis Layanan KB (Radio Card Selector) -->
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-bold text-slate-900">
                                1. Pilih Jenis Layanan KB Yang Diinginkan <span class="text-rose-500">*</span>
                            </label>
                            <a href="{{ route('services.index') }}" target="_blank" class="text-xs font-semibold text-teal-600 hover:text-teal-800">
                                Pelajari Tiap Jenis Layanan &rarr;
                            </a>
                        </div>
                        <p class="text-xs text-slate-500">Pilih salah satu metode kontrasepsi di bawah ini:</p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 pt-1">
                            @foreach($services as $service)
                                @php
                                    $isSelected = old('kb_service_id', $selectedService?->id) == $service->id;
                                @endphp
                                <label class="relative flex flex-col p-4 rounded-2xl border-2 cursor-pointer transition-all duration-200 {{ $isSelected ? 'border-teal-600 bg-teal-50/50 shadow-xs ring-2 ring-teal-500/20' : 'border-slate-200 hover:border-slate-300 hover:bg-slate-50' }}">
                                    <div class="flex items-start justify-between">
                                        <div class="font-bold text-sm text-slate-900">{{ $service->name }}</div>
                                        <input type="radio" name="kb_service_id" value="{{ $service->id }}" class="mt-0.5 text-teal-600 focus:ring-teal-500 h-4 w-4" {{ $isSelected ? 'checked' : '' }} required>
                                    </div>
                                    <div class="text-[11px] font-semibold text-teal-700 mt-1">{{ $service->category }}</div>
                                    <div class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">{{ $service->short_description }}</div>
                                    @if($service->duration)
                                        <div class="mt-3 pt-2 border-t border-slate-200/60 text-[11px] text-slate-600 font-medium">
                                            Durasi: {{ $service->duration }}
                                        </div>
                                    @endif
                                </label>
                            @endforeach
                        </div>
                        @error('kb_service_id')
                            <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Data Pribadi Pasien -->
                    <div class="space-y-4 pt-4 border-t border-slate-100">
                        <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider text-teal-700">2. Identitas Lengkap Pasien</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <!-- Nama Lengkap Pasien -->
                            <div>
                                <label for="patient_name" class="block text-xs font-bold text-slate-700 mb-1">
                                    Nama Lengkap Pasien (Ibu) <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" id="patient_name" name="patient_name" value="{{ old('patient_name') }}" required placeholder="Contoh: Siti Aminah" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('patient_name') border-rose-400 bg-rose-50/30 @enderror">
                                @error('patient_name')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Suami -->
                            <div>
                                <label for="husband_name" class="block text-xs font-bold text-slate-700 mb-1">
                                    Nama Suami <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" id="husband_name" name="husband_name" value="{{ old('husband_name') }}" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('husband_name') border-rose-400 bg-rose-50/30 @enderror">
                                @error('husband_name')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- NIK -->
                            <div>
                                <label for="nik" class="block text-xs font-bold text-slate-700 mb-1">
                                    NIK Pasien (16 Digit Sesuai KTP) <span class="text-rose-500">*</span>
                                </label>
                                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" maxlength="16" pattern="\d{16}" required placeholder="Contoh: 3201124508920001" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors font-mono @error('nik') border-rose-400 bg-rose-50/30 @enderror">
                                <span class="text-[11px] text-slate-400 mt-1 block">Pastikan tepat 16 digit angka.</span>
                                @error('nik')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Lahir -->
                            <div>
                                <label for="birth_date" class="block text-xs font-bold text-slate-700 mb-1">
                                    Tanggal Lahir Pasien <span class="text-rose-500">*</span>
                                </label>
                                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('birth_date') border-rose-400 bg-rose-50/30 @enderror">
                                @error('birth_date')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nomor Telepon / WA -->
                            <div>
                                <label for="phone_number" class="block text-xs font-bold text-slate-700 mb-1">
                                    Nomor Handphone / WhatsApp
                                </label>
                                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="Contoh: 081234567890" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('phone_number') border-rose-400 bg-rose-50/30 @enderror">
                                <span class="text-[11px] text-slate-400 mt-1 block">Untuk notifikasi pengingat jadwal kontrol (opsional).</span>
                                @error('phone_number')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Riwayat KB -->
                            <div>
                                <label for="kb_history" class="block text-xs font-bold text-slate-700 mb-1">
                                    Status / Riwayat KB Pasien <span class="text-rose-500">*</span>
                                </label>
                                <select id="kb_history" name="kb_history" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors bg-white">
                                    <option value="Peserta Baru" {{ old('kb_history') == 'Peserta Baru' ? 'selected' : '' }}>Peserta Baru (Pertama kali memakai KB)</option>
                                    <option value="Peserta Ulangan" {{ old('kb_history', 'Peserta Ulangan') == 'Peserta Ulangan' ? 'selected' : '' }}>Peserta Ulangan (Melanjutkan metode yang sama)</option>
                                    <option value="Ganti Cara" {{ old('kb_history') == 'Ganti Cara' ? 'selected' : '' }}>Ganti Cara (Beralih dari metode kontrasepsi sebelumnya)</option>
                                </select>
                                @error('kb_history')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tanggal Pelayanan -->
                            <div class="sm:col-span-2">
                                <label for="service_date" class="block text-xs font-bold text-slate-700 mb-1">
                                    Tanggal Pelayanan / Kunjungan ke Faskes <span class="text-rose-500">*</span>
                                </label>
                                <input type="date" id="service_date" name="service_date" value="{{ old('service_date', date('Y-m-d')) }}" required class="w-full sm:w-1/2 px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('service_date') border-rose-400 bg-rose-50/30 @enderror">
                                <span class="text-[11px] text-slate-500 mt-1 block">Default hari ini atau pilih tanggal rencana kunjungan Anda.</span>
                                @error('service_date')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Alamat Pasien -->
                            <div class="sm:col-span-2">
                                <label for="address" class="block text-xs font-bold text-slate-700 mb-1">
                                    Alamat Domisili Lengkap Pasien <span class="text-rose-500">*</span>
                                </label>
                                <textarea id="address" name="address" rows="3" required placeholder="Tuliskan nama jalan, RT/RW, Dusun, Kelurahan/Desa, dan Kecamatan tempat tinggal saat ini" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors @error('address') border-rose-400 bg-rose-50/30 @enderror">{{ old('address') }}</textarea>
                                @error('address')
                                    <p class="text-xs text-rose-600 font-medium mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Catatan / Keluhan -->
                            <div class="sm:col-span-2">
                                <label for="notes" class="block text-xs font-bold text-slate-700 mb-1">
                                    Catatan Tambahan / Keluhan (Opsional)
                                </label>
                                <input type="text" id="notes" name="notes" value="{{ old('notes') }}" placeholder="Contoh: Pernah operasi sesar 2 tahun lalu, ada riwayat alergi obat, dll" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 focus:ring-2 focus:ring-teal-500/20 text-sm transition-colors">
                            </div>
                        </div>
                    </div>

                    <!-- Syarat & Submit -->
                    <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div class="text-xs text-slate-500 flex items-center gap-2">
                            <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            Data pribadi dienkripsi dan hanya digunakan untuk keperluan rekam medis KB.
                        </div>

                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-2xl text-base font-bold text-white bg-linear-to-r from-teal-600 to-emerald-600 hover:from-teal-500 hover:to-emerald-500 shadow-lg shadow-teal-600/30 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
