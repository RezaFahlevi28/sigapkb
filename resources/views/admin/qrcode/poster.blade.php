<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poster QR Code Pelayanan KB - Siap Tempel</title>
    @vite(['resources/css/app.css'])
    <style>
        @media print {
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none !important; }
            @page {
                size: A4 portrait;
                margin: 1.5cm;
            }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 p-4 sm:p-10 font-sans antialiased">

    <!-- Print Control Bar -->
    <div class="max-w-2xl mx-auto mb-6 flex items-center justify-between no-print">
        <a href="{{ route('admin.qrcode.index') }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-slate-900 bg-white px-3 py-2 rounded-xl border border-slate-200">
            &larr; Kembali ke Admin
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-bold text-sm shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak Poster A4 Sekarang
        </button>
    </div>

    <!-- Official Hospital Mountable Poster (A4 Container) -->
    <div class="max-w-2xl mx-auto bg-white rounded-3xl border-4 border-teal-600 p-10 sm:p-14 shadow-2xl text-center space-y-8 flex flex-col items-center justify-between min-h-[900px]">
        
        <!-- Header & Kop -->
        <div class="space-y-3 w-full border-b-2 border-slate-200 pb-6">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-teal-50 border border-teal-200 text-teal-800 text-xs font-bold uppercase tracking-wider">
                Fasilitas Kesehatan Pelayanan KB Resmi
            </div>
            <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight leading-tight uppercase">
                PENDAFTARAN PELAYANAN KB
            </h1>
            <p class="text-base font-semibold text-teal-700 uppercase tracking-widest">
                Sistem Informasi & Pencatatan Pelayanan (SIGAP KB)
            </p>
        </div>

        <!-- Big QR Area -->
        <div class="space-y-4 flex flex-col items-center">
            <div class="text-sm font-extrabold text-slate-700 uppercase tracking-wide">
                Pindai QR Code Menggunakan Kamera Ponsel Anda:
            </div>

            <!-- Crisp Vector QR Frame -->
            <div class="p-6 bg-slate-50 border-4 border-slate-900 rounded-3xl shadow-lg inline-block">
                <div class="w-64 h-64 bg-white p-2 rounded-2xl flex items-center justify-center">
                    {!! $qrCodeRawSvg !!}
                </div>
            </div>

            <div class="text-xs text-slate-500 font-mono">
                Atau kunjungi: <span class="font-bold text-teal-800">{{ $targetUrl }}</span>
            </div>
        </div>

        <!-- Panduan 3 Langkah Scan di Bawah -->
        <div class="w-full grid grid-cols-3 gap-4 text-left border-t-2 border-slate-200 pt-6">
            <div class="p-3.5 rounded-2xl bg-teal-50/70 border border-teal-100 space-y-1">
                <div class="w-6 h-6 rounded-full bg-teal-700 text-white font-bold text-xs flex items-center justify-center">1</div>
                <div class="font-bold text-xs text-slate-900">Buka Kamera HP</div>
                <div class="text-[11px] text-slate-600">Arahkan kamera ke QR Code di atas.</div>
            </div>

            <div class="p-3.5 rounded-2xl bg-teal-50/70 border border-teal-100 space-y-1">
                <div class="w-6 h-6 rounded-full bg-teal-700 text-white font-bold text-xs flex items-center justify-center">2</div>
                <div class="font-bold text-xs text-slate-900">Isi Formulir Pasien</div>
                <div class="text-[11px] text-slate-600">Pilih layanan KB & isi NIK pasien.</div>
            </div>

            <div class="p-3.5 rounded-2xl bg-teal-50/70 border border-teal-100 space-y-1">
                <div class="w-6 h-6 rounded-full bg-teal-700 text-white font-bold text-xs flex items-center justify-center">3</div>
                <div class="font-bold text-xs text-slate-900">Tunjukkan Bukti</div>
                <div class="text-[11px] text-slate-600">Perlihatkan nomor antrian ke petugas.</div>
            </div>
        </div>

        <!-- Layanan Tersedia Footer -->
        <div class="w-full pt-4 border-t border-slate-100 text-[11px] text-slate-500 flex flex-wrap justify-center gap-x-4 gap-y-1">
            <span>&bull; IUD (Spiral)</span>
            <span>&bull; Implan (Susuk KB)</span>
            <span>&bull; Suntikan KB (1 & 3 Bulan)</span>
            <span>&bull; Pil KB</span>
            <span>&bull; Kondom</span>
        </div>

        <div class="text-[10px] text-slate-400">
            Diterbitkan oleh Sistem Informasi dan Pencatatan Pelayanan KB (SIGAP KB)
        </div>
    </div>

</body>
</html>
