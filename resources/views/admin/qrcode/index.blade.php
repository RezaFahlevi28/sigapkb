<x-layouts.admin>
    <x-slot:pageHeader>Manajemen QR Code Pelayanan KB</x-slot:pageHeader>
    <x-slot:pageSubheader>Buat, sesuaikan, dan unduh QR Code pendaftaran untuk ditempel di loket dan area faskes</x-slot:pageSubheader>

    <div class="space-y-8 max-w-5xl">
        <!-- Configuration Card -->
        <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
            <h2 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-2">Konfigurasi Target URL QR Code</h2>
            <p class="text-xs text-slate-500 mb-4">
                QR Code akan mengarahkan kamera pasien langsung ke halaman pendaftaran pelayanan KB. Anda dapat menyesuaikan alamat URL (misal jika ingin menggunakan IP lokal faskes atau domain khusus).
            </p>

            <form method="GET" action="{{ route('admin.qrcode.index') }}" class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1">
                    <label for="target_url" class="block text-[11px] font-bold text-slate-500 uppercase mb-1">Target URL Pendaftaran</label>
                    <input type="url" id="target_url" name="target_url" value="{{ $targetUrl }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-teal-600 font-mono text-xs">
                </div>
                <div class="self-end flex gap-2">
                    <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 transition-colors">
                        Perbarui QR
                    </button>
                    <a href="{{ route('admin.qrcode.index') }}" class="px-4 py-2.5 rounded-xl text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 transition-colors">
                        Default
                    </a>
                </div>
            </form>
        </div>

        <!-- QR Code & Poster Showcase -->
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <!-- Left: QR Code Preview & Direct Download -->
            <div class="md:col-span-5 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs text-center space-y-4">
                <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Preview Kode QR Vector</span>

                <!-- QR Container -->
                <div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 inline-block mx-auto shadow-inner">
                    <div class="w-48 h-48 bg-white p-2 rounded-xl shadow-xs border border-slate-200 flex items-center justify-center">
                        <img src="{{ $qrCodeDataUri }}" alt="QR Code Pendaftaran" class="w-full h-full object-contain">
                    </div>
                </div>

                <div class="text-xs text-slate-600 break-all font-mono px-2">
                    {{ $targetUrl }}
                </div>

                <div class="pt-2 flex flex-col gap-2">
                    <a href="{{ route('admin.qrcode.download', ['target_url' => $targetUrl]) }}" class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl text-xs font-bold text-white bg-teal-600 hover:bg-teal-700 shadow-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                        Unduh File QR Code (SVG)
                    </a>
                </div>
            </div>

            <!-- Right: Printable Hospital Poster Presentation -->
            <div class="md:col-span-7 bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-5">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900">Poster Siap Cetak (Ukuran A4)</h3>
                        <p class="text-xs text-slate-500">Desain resmi untuk ditempel di ruang tunggu / loket KB</p>
                    </div>

                    <a href="{{ route('admin.qrcode.poster', ['target_url' => $targetUrl]) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold text-white bg-slate-900 hover:bg-slate-800 shadow-sm transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                        Buka & Cetak Poster A4
                    </a>
                </div>

                <!-- Miniature Poster Preview -->
                <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 bg-slate-50 text-center space-y-4">
                    <div class="space-y-1">
                        <div class="text-[10px] font-bold text-teal-700 uppercase tracking-widest">RUMAH SAKIT / PUSKESMAS</div>
                        <h4 class="text-base font-black text-slate-900 uppercase">PENDAFTARAN PELAYANAN KB</h4>
                        <p class="text-xs text-slate-500">Pindai QR Code di bawah menggunakan kamera ponsel Anda</p>
                    </div>

                    <div class="w-36 h-36 mx-auto bg-white p-2 rounded-xl border border-slate-300 shadow-xs flex items-center justify-center">
                        <img src="{{ $qrCodeDataUri }}" alt="QR Code" class="w-full h-full object-contain">
                    </div>

                    <div class="grid grid-cols-3 gap-2 text-left text-[10px] text-slate-600 bg-white p-3 rounded-xl border border-slate-200">
                        <div><strong>1. Pindai</strong><br>Arahkan kamera HP</div>
                        <div><strong>2. Isi Form</strong><br>Lengkapi data pasien</div>
                        <div><strong>3. Verifikasi</strong><br>Tunjukkan nomor antrean</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-teal-50 border border-teal-100 text-xs text-teal-800 space-y-1">
                    <span class="font-bold">Tips Penempatan di Faskes:</span>
                    <p>Tempelkan poster di pintu masuk poli KB, meja resepsionis/loket pendaftaran umum, dan area tunggu pasien agar pasien dapat mendaftar mandiri saat menunggu.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
