<x-layouts.admin>
    <x-slot:pageHeader>Katalog Layanan KB</x-slot:pageHeader>
    <x-slot:pageSubheader>Kelola daftar layanan kontrasepsi, informasi edukasi, dan status ketersediaan</x-slot:pageSubheader>

    <div class="space-y-6">
        <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-slate-900">Daftar Metode Kontrasepsi (KB)</h2>
                    <p class="text-xs text-slate-500">Layanan yang aktif akan muncul di formulir pendaftaran dan halaman edukasi publik</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-200 text-slate-500 font-bold uppercase tracking-wider text-[11px]">
                        <tr>
                            <th class="py-3 px-4">Urutan</th>
                            <th class="py-3 px-4">Nama Layanan</th>
                            <th class="py-3 px-4">Kategori</th>
                            <th class="py-3 px-4">Masa Efektif</th>
                            <th class="py-3 px-4">Tingkat Efektivitas</th>
                            <th class="py-3 px-4">Total Pasien</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($services as $service)
                            <tr class="hover:bg-slate-50/70 transition-colors">
                                <td class="py-4 px-4 font-mono font-bold text-slate-400">#{{ $service->sort_order }}</td>
                                <td class="py-4 px-4">
                                    <div class="font-bold text-slate-900 text-sm">{{ $service->name }}</div>
                                    <div class="text-[11px] text-slate-500 line-clamp-1 max-w-xs">{{ $service->short_description }}</div>
                                </td>
                                <td class="py-4 px-4 font-medium text-teal-800">
                                    {{ $service->category }}
                                </td>
                                <td class="py-4 px-4 text-slate-700">
                                    {{ $service->duration ?? '-' }}
                                </td>
                                <td class="py-4 px-4 font-semibold text-emerald-700">
                                    {{ $service->effectiveness ?? '-' }}
                                </td>
                                <td class="py-4 px-4 font-bold text-slate-900">
                                    {{ $service->patient_registrations_count }} pasien
                                </td>
                                <td class="py-4 px-4">
                                    <form method="POST" action="{{ route('admin.services.toggle', $service->id) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase transition-colors {{ $service->is_active ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200' : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}">
                                            {{ $service->is_active ? 'Aktif' : 'Non-aktif' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="py-4 px-4 text-right">
                                    <a href="{{ route('admin.services.edit', $service->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg text-xs font-bold text-teal-700 bg-teal-50 hover:bg-teal-100 transition-colors">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
