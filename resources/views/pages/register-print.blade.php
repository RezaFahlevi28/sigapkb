<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukti Pendaftaran KB - {{ $registration->registration_number }}</title>
    @vite(['resources/css/app.css'])
    <style>
        @media print {
            body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 p-4 sm:p-8 font-sans antialiased">

    <!-- Floating Print Button (Hidden on paper) -->
    <div class="max-w-xl mx-auto mb-6 flex items-center justify-between no-print">
        <a href="{{ route('pelayanan.success', $registration->registration_number) }}" class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-600 hover:text-slate-900 bg-white px-3 py-2 rounded-xl border border-slate-200">
            &larr; Kembali
        </a>
        <button onclick="window.print()" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-teal-600 hover:bg-teal-700 text-white font-bold text-sm shadow-md transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak Bukti Sekarang
        </button>
    </div>

    <!-- Printable Card -->
    <div class="max-w-xl mx-auto bg-white rounded-2xl border border-slate-300 p-8 shadow-md">
        <!-- Letterhead / Header Faskes -->
        <div class="text-center pb-6 border-b-2 border-slate-800 space-y-1">
            <h1 class="text-lg font-black tracking-tight text-slate-900 uppercase">FASILITAS KESEHATAN PELAYANAN KB</h1>
            <p class="text-xs text-slate-600">SISTEM INFORMASI DAN PENCATATAN KELUARGA BERENCANA (SIGAP KB)</p>
            <p class="text-[10px] text-slate-500">KARTU BUKTI PENDAFTARAN & ANTRIAN PELAYANAN KONTRASEPSI</p>
        </div>

        <!-- Nomor Registrasi & Barcode -->
        <div class="py-6 flex flex-col items-center justify-center text-center border-b border-slate-200 gap-2">
            <div class="text-[11px] font-bold text-slate-500 uppercase tracking-widest">Nomor Registrasi Pasien</div>
            <div class="text-2xl font-black font-mono tracking-wider text-teal-800">
                {{ $registration->registration_number }}
            </div>
            <div class="w-32 h-32 p-2 border border-slate-300 rounded-xl mt-2 flex items-center justify-center">
                {!! $qrCodeRawSvg !!}
            </div>
            <span class="text-[10px] text-slate-400">Pindai QR untuk verifikasi identitas</span>
        </div>

        <!-- Tabel Identitas Pasien -->
        <div class="py-6 space-y-3 text-xs">
            <table class="w-full text-left border-collapse">
                <tbody>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium w-1/3">Nama Pasien</td>
                        <td class="py-2 font-bold text-slate-900">: {{ $registration->patient_name }}</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">Nama Suami</td>
                        <td class="py-2 font-bold text-slate-900">: {{ $registration->husband_name }}</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">NIK</td>
                        <td class="py-2 font-mono font-semibold text-slate-800">: {{ $registration->nik }}</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">Tanggal Lahir</td>
                        <td class="py-2 text-slate-800">: {{ $registration->birth_date ? $registration->birth_date->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">Layanan KB Terpilih</td>
                        <td class="py-2 font-bold text-teal-700">: {{ $registration->kbService?->name }} ({{ $registration->kbService?->category }})</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">Riwayat KB</td>
                        <td class="py-2 text-slate-800">: {{ $registration->kb_history }}</td>
                    </tr>
                    <tr class="border-b border-slate-100">
                        <td class="py-2 text-slate-500 font-medium">Tanggal Pelayanan</td>
                        <td class="py-2 font-bold text-slate-900">: {{ $registration->service_date ? $registration->service_date->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 text-slate-500 font-medium align-top">Alamat Pasien</td>
                        <td class="py-2 text-slate-700 align-top">: {{ $registration->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Instruksi -->
        <div class="pt-4 border-t border-slate-200 text-[11px] text-slate-500 space-y-1">
            <p class="font-bold text-slate-700">Catatan untuk Pasien:</p>
            <p>1. Harap membawa kartu ini beserta KTP asli saat berkunjung ke fasilitas kesehatan.</p>
            <p>2. Pelayanan diberikan sesuai jam operasional poli KB faskes bersangkutan.</p>
        </div>

        <!-- Cap / Tanda Tangan Staff -->
        <div class="mt-8 pt-4 flex justify-between text-[11px] text-slate-600">
            <div class="text-center">
                <p>Pasien Bersangkutan,</p>
                <div class="h-14"></div>
                <p class="font-semibold">({{ $registration->patient_name }})</p>
            </div>
            <div class="text-center">
                <p>Petugas Pelayanan KB,</p>
                <div class="h-14"></div>
                <p class="font-semibold">(......................................)</p>
            </div>
        </div>
    </div>

</body>
</html>
