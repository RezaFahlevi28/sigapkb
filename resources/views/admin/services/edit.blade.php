<x-layouts.admin>
    <x-slot:pageHeader>Ubah Data Layanan KB</x-slot:pageHeader>
    <x-slot:pageSubheader>Layanan: {{ $service->name }}</x-slot:pageSubheader>

    <div class="max-w-4xl space-y-6">
        <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-600 hover:text-slate-900 bg-white px-3.5 py-2 rounded-xl border border-slate-200">
            &larr; Batal & Kembali ke Katalog
        </a>

        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs p-6 sm:p-8">
            <form method="POST" action="{{ route('admin.services.update', $service->id) }}" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 mb-1">Nama Layanan KB <span class="text-rose-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('name') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-xs font-bold text-slate-700 mb-1">Kategori Metode <span class="text-rose-500">*</span></label>
                        <input type="text" id="category" name="category" value="{{ old('category', $service->category) }}" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                        @error('category') <p class="text-xs text-rose-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="effectiveness" class="block text-xs font-bold text-slate-700 mb-1">Tingkat Efektivitas</label>
                        <input type="text" id="effectiveness" name="effectiveness" value="{{ old('effectiveness', $service->effectiveness) }}" placeholder="Contoh: 99.4% Sangat Efektif" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                    </div>

                    <div>
                        <label for="duration" class="block text-xs font-bold text-slate-700 mb-1">Durasi / Masa Efektif</label>
                        <input type="text" id="duration" name="duration" value="{{ old('duration', $service->duration) }}" placeholder="Contoh: 5 - 10 Tahun" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="short_description" class="block text-xs font-bold text-slate-700 mb-1">Informasi Singkat Layanan <span class="text-rose-500">*</span></label>
                        <textarea id="short_description" name="short_description" rows="2" required class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">{{ old('short_description', $service->short_description) }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="full_description" class="block text-xs font-bold text-slate-700 mb-1">Penjelasan Lengkap (Edukasi Pasien)</label>
                        <textarea id="full_description" name="full_description" rows="3" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">{{ old('full_description', $service->full_description) }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="procedure_instructions" class="block text-xs font-bold text-slate-700 mb-1">Petunjuk Persiapan / Pemasangan Pasien</label>
                        <textarea id="procedure_instructions" name="procedure_instructions" rows="2" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 text-sm">{{ old('procedure_instructions', $service->procedure_instructions) }}</textarea>
                    </div>

                    <div class="sm:col-span-2">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="rounded text-teal-600 focus:ring-teal-500 h-4 w-4">
                            <span class="text-xs font-bold text-slate-700">Layanan ini aktif dan dapat dipilih oleh pasien</span>
                        </label>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                    <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-md transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
