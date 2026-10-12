# BUKU PANDUAN PENGGUNA (MANUAL BOOK)
# PANEL ADMINISTRASI WEB SIGAP KB
### Sistem Informasi dan Gerakan Pelayanan Keluarga Berencana

---

## DAFTAR ISI

1. [BAB I: PENDAHULUAN](#bab-i-pendahuluan)
   - 1.1 [Tentang Sistem SIGAP KB](#11-tentang-sistem-sigap-kb)
   - 1.2 [Tujuan Manual Book](#12-tujuan-manual-book)
   - 1.3 [Kebutuhan Perangkat & Browser](#13-kebutuhan-perangkat--browser)
2. [BAB II: AUTENTIKASI & AKSES MASUK ADMIN](#bab-ii-autentikasi--akses-masuk-admin)
   - 2.1 [Mengakses Halaman Login](#21-mengakses-halaman-login)
   - 2.2 [Proses Masuk (Login)](#22-proses-masuk-login)
   - 2.3 [Keluar dari Sistem (Logout)](#23-keluar-dari-sistem-logout)
3. [BAB III: DASHBOARD & STATISTIK PELAYANAN](#bab-iii-dashboard--statistik-pelayanan)
   - 3.1 [Struktur Antarmuka Administrator](#31-struktur-antarmuka-administrator)
   - 3.2 [Kartu Metrik & Ringkasan Pasien](#32-kartu-metrik--ringkasan-pasien)
   - 3.3 [Statistik Distribusi Layanan KB](#33-statistik-distribusi-layanan-kb)
   - 3.4 [Antrean Pasien Terbaru](#34-antrean-pasien-terbaru)
4. [BAB IV: MANAJEMEN DATA PASIEN](#bab-iv-manajemen-data-pasien)
   - 4.1 [Melihat Daftar Pasien](#41-melihat-daftar-pasien)
   - 4.2 [Pencarian & Penyaringan (Filter) Data](#42-pencarian--penyaringan-filter-data)
   - 4.3 [Melihat Detail Pasien](#43-melihat-detail-pasien)
   - 4.4 [Memperbarui Status Pelayanan](#44-memperbarui-status-pelayanan)
   - 4.5 [Mengubah / Mengedit Data Pasien](#45-mengubah--mengedit-data-pasien)
   - 4.6 [Menghapus Data Pasien](#46-menghapus-data-pasien)
5. [BAB V: LAPORAN & REKAPITULASI PELAYANAN](#bab-v-laporan--rekapitulasi-pelayanan)
   - 5.1 [Membuka Menu Laporan](#51-membuka-menu-laporan)
   - 5.2 [Filter Periode Bulan, Tahun & Layanan](#52-filter-periode-bulan-tahun--layanan)
   - 5.3 [Ringkasan Rekapitulasi Periode](#53-ringkasan-rekapitulasi-periode)
   - 5.4 [Ekspor Laporan ke Microsoft Excel (.CSV)](#54-ekspor-laporan-ke-microsoft-excel-csv)
6. [BAB VI: MANAJEMEN & CETAK QR CODE](#bab-vi-manajemen--cetak-qr-code)
   - 6.1 [Konfigurasi Target URL QR Code](#61-konfigurasi-target-url-qr-code)
   - 6.2 [Mengunduh File QR Code Vektor (SVG)](#62-mengunduh-file-qr-code-vektor-svg)
   - 6.3 [Mencetak Poster A4 untuk Ruang Tunggu](#63-mencetak-poster-a4-untuk-ruang-tunggu)
7. [BAB VII: MANAJEMEN KATALOG LAYANAN KB](#bab-vii-manajemen-katalog-layanan-kb)
   - 7.1 [Melihat Daftar Layanan Kontrasepsi](#71-melihat-daftar-layanan-kontrasepsi)
   - 7.2 [Mengaktifkan / Menonaktifkan Layanan](#72-mengaktifkan--menonaktifkan-layanan)
   - 7.3 [Mengubah Rincian & Informasi Medis Layanan](#73-mengubah-rincian--informasi-medis-layanan)
8. [BAB VIII: TANYA JAWAB & PANDUAN PEMECAHAN MASALAH (FAQ)](#bab-viii-tanya-jawab--panduan-pemecahan-masalah-faq)

---

## BAB I: PENDAHULUAN

### 1.1 Tentang Sistem SIGAP KB
**SIGAP KB** (*Sistem Informasi dan Gerakan Pelayanan Keluarga Berencana*) adalah aplikasi berbasis web yang dirancang khusus untuk memfasilitasi operasional pelayanan Keluarga Berencana di fasilitas kesehatan (Puskesmas / Klinik KB). Sistem ini menjembatani pendaftaran mandiri oleh masyarakat umum dengan sistem pengelolaan administrasi, rekapitulasi data medis, dan pelaporan berkala bagi petugas kesehatan.

### 1.2 Tujuan Manual Book
Buku panduan ini disusun sebagai acuan operasional bagi Administrator dan Petugas Faskes dalam mengoperasikan seluruh modul pada Panel Admin SIGAP KB, mulai dari manajemen antrean pasien hingga pelaporan berkala.

### 1.3 Kebutuhan Perangkat & Browser
Aplikasi web SIGAP KB dapat diakses melalui perangkat komputer kerja, laptop, tablet, maupun smartphone dengan spesifikasi yang disarankan:
- **Web Browser**: Google Chrome (versi 90+), Mozilla Firefox (versi 90+), Microsoft Edge (versi 90+), atau Safari.
- **Resolusi Layar**: Minimal 1280 x 720 piksel (disarankan layar komputer/desktop untuk kenyamanan pengelolaan data tabel).
- **Aplikasi Pendukung**: Microsoft Excel atau aplikasi spreadsheet serupa untuk membuka berkas hasil ekspor laporan.

---

## BAB II: AUTENTIKASI & AKSES MASUK ADMIN

### 2.1 Mengakses Halaman Login
Untuk masuk ke panel pengelolaan admin:
1. Buka browser internet Anda.
2. Masukkan alamat URL:  
   `http://[domain-aplikasi]/admin/login`  
   *(Contoh lokal: `http://sigapkb.test/admin/login` atau `http://localhost/sigapkb/public/admin/login`)*.
3. Anda akan diarahkan ke halaman formulir **Login Petugas KB**.

> 📸 **[TEMPAT GAMBAR 2.1: Halaman Login Petugas Admin]**  
> *(Ganti baris di bawah ini dengan gambar screenshot Anda, misal: `![Halaman Login](img/manual/01_login_admin.png)`)*  
> ![Placeholder Halaman Login Petugas Admin](https://placehold.co/800x450?text=Gambar+2.1+Halaman+Login+Petugas+Admin)

---

### 2.2 Proses Masuk (Login)
1. Isi kolom **Alamat Email Petugas** dengan alamat email akun administrator yang terdaftar (misal: `admin@sigapkb.test`).
2. Masukkan **Kata Sandi (Password)** Anda.
3. Centang opsi **Ingat saya** apabila Anda menggunakan komputer pribadi agar sesi login tidak cepat berakhir.
4. Klik tombol **Masuk ke Panel Admin →**.
5. Jika data akun sesuai, sistem akan langsung mengarahkan Anda ke halaman **Dashboard Admin**.

> 💡 **Informasi Akun Bawaan (Default):**
> - **Email**: `admin@sigapkb.test`
> - **Password**: `password`

---

### 2.3 Keluar dari Sistem (Logout)
Setelah selesai mengelola data, sangat disarankan untuk keluar dari sesi admin demi keamanan data pasien:
1. Pada menu navigasi sebelah kiri (sidebar), scroll ke bagian paling bawah.
2. Klik tombol **Keluar (Logout)** yang bertanda ikon keluar berwarna merah.
3. Sesi Anda akan dihentikan dan sistem kembali menampilkan halaman login.

> 📸 **[TEMPAT GAMBAR 2.2: Tombol Logout pada Sidebar Admin]**  
> ![Placeholder Tombol Logout pada Sidebar](https://placehold.co/400x150?text=Gambar+2.2+Tombol+Logout+Sidebar)

---

## BAB III: DASHBOARD & STATISTIK PELAYANAN

### 3.1 Struktur Antarmuka Administrator
Antarmuka panel admin terbagi menjadi dua bagian utama:
1. **Sidebar Menu (Kiri)**: Berisi logo SIGAP KB, navigasi halaman (Dashboard, Data Pasien, Laporan, Manajemen QR, Katalog Layanan), serta profil pengguna yang sedang login.
2. **Konten Utama (Kanan)**: Area kerja dinamis yang menampilkan data, formulir, atau laporan sesuai menu yang dipilih.

> 📸 **[TEMPAT GAMBAR 3.1: Tampilan Keseluruhan Dashboard Admin]**  
> ![Placeholder Dashboard Utama](https://placehold.co/900x500?text=Gambar+3.1+Tampilan+Utama+Dashboard)

---

### 3.2 Kartu Metrik & Ringkasan Pasien
Pada bagian atas dashboard, terdapat 4 kartu ringkasan metrik instan:
- **Total Pasien Terdaftar**: Menghitung seluruh pasien yang pernah terdaftar dalam sistem.
- **Pendaftaran Hari Ini**: Jumlah pasien yang mendaftar pada tanggal berjalan.
- **Menunggu Pelayanan**: Jumlah pasien yang statusnya masih antre / belum dipanggil.
- **Pelayanan Selesai**: Jumlah pasien yang telah selesai menerima tindakan medis KB.

> 📸 **[TEMPAT GAMBAR 3.2: 4 Kartu Metrik Dashboard]**  
> ![Placeholder Kartu Metrik](https://placehold.co/800x200?text=Gambar+3.2+Kartu+Metrik+Dashboard)

---

### 3.3 Statistik Distribusi Layanan KB
Bagian ini menampilkan kartu-kartu rekapitulasi jumlah pasien untuk setiap jenis layanan kontrasepsi (seperti IUD, Implan, Suntik KB, Pil KB, Kondom, dll.), lengkap dengan persentase proporsi peminatnya.

---

### 3.4 Antrean Pasien Terbaru
Tabel di bagian bawah dashboard memuat daftar 5 pendaftaran pasien paling baru, memungkinkan admin memantau kedatangan pasien secara *real-time* tanpa harus membuka menu Data Pasien.

---

## BAB IV: MANAJEMEN DATA PASIEN

Modul ini digunakan untuk mencari, memeriksa detail, memperbarui status pelayanan medis, mengoreksi identitas, maupun menghapus data registrasi pasien.

### 4.1 Melihat Daftar Pasien
Klik menu **Data Pasien** pada sidebar kiri. Anda akan melihat tabel komprehensif berisi seluruh rekam pendaftaran pasien dengan informasi:
- No. Urut & Nomor Registrasi (contoh: `KB-20261012-0001`).
- Nama Lengkap Pasien & Nama Suami.
- NIK (16 digit) & Usia Pasien.
- Kontak Telepon / WhatsApp.
- Layanan KB yang Dipilih & Riwayat Kepesertaan (Baru, Ulangan, atau Ganti Cara).
- Tanggal Pelayanan yang Direncanakan.
- Status Pelayanan (*Badge* warna: Menunggu, Dilayani, Selesai, Dibatalkan).
- Kolom Aksi (*Detail, Edit, Ubah Status, Hapus*).

> 📸 **[TEMPAT GAMBAR 4.1: Tabel Data Pasien & Formulir Filter]**  
> ![Placeholder Tabel Data Pasien](https://placehold.co/900x450?text=Gambar+4.1+Tabel+Data+Pasien)

---

### 4.2 Pencarian & Penyaringan (Filter) Data
Di atas tabel data pasien, tersedia formulir pencarian cepat:
1. **Cari Nama / NIK / No. Reg**: Ketik kata kunci pencarian (misal NIK 16 digit atau nama pasien).
2. **Jenis Layanan**: Pilih metode KB tertentu (misal hanya IUD atau Implan).
3. **Status**: Filter berdasarkan status (Menunggu, Dilayani, Selesai, atau Dibatalkan).
4. **Tanggal Mulai & Tanggal Akhir**: Tentukan rentang tanggal rencana pelayanan.
5. Klik tombol **Terapkan Filter**.
6. Klik **Reset Filter** untuk mengembalikan tampilan ke seluruh data tanpa filter.

---

### 4.3 Melihat Detail Pasien
1. Pada baris pasien yang diinginkan, klik tombol **Detail** (ikon mata 👁️).
2. Sistem akan membuka halaman rincian lengkap mencakup:
   - Identitas lengkap pasien dan suami.
   - Alamat domisili lengkap.
   - Layanan KB yang dipilih dan riwayat KB sebelumnya.
   - Catatan / keluhan medis tambahan yang diisi pasien saat mendaftar mandiri.
   - Tautan langsung hubungi via WhatsApp jika nomor handphone tersedia.

> 📸 **[TEMPAT GAMBAR 4.2: Halaman Rincian Detail Pasien]**  
> ![Placeholder Detail Pasien](https://placehold.co/800x500?text=Gambar+4.2+Halaman+Detail+Pasien)

---

### 4.4 Memperbarui Status Pelayanan
Admin dapat memperbarui alur proses pelayanan pasien secara cepat:
1. Buka halaman detail pasien atau tabel pasien.
2. Terdapat pilihan status:
   - **Menunggu**: Pasien telah mendaftar, menunggu antrean panggilan faskes.
   - **Dilayani**: Pasien sedang berada di ruang tindakan / sedang dikonseling oleh bidan/dokter.
   - **Selesai**: Tindakan pemasangan/pemberian kontrasepsi telah selesai dilakukan.
   - **Dibatalkan**: Pasien berhalangan hadir atau pendaftaran dibatalkan karena kontraindikasi medis.
3. Pilih status baru lalu konfirmasi penyimpanan.

---

### 4.5 Mengubah / Mengedit Data Pasien
Jika pasien meminta koreksi data (misalnya salah ketik NIK, nama, tanggal lahir, alamat, atau ingin mengganti metode kontrasepsi):
1. Klik tombol **Edit** (ikon pensil ✏️) pada tabel atau halaman detail.
2. Perbarui kolom data yang perlu disesuaikan pada formulir.
3. Klik tombol **Simpan Perubahan Data**.

> 📸 **[TEMPAT GAMBAR 4.3: Formulir Koreksi/Edit Data Pasien]**  
> ![Placeholder Formulir Edit Data Pasien](https://placehold.co/800x500?text=Gambar+4.3+Formulir+Edit+Pasien)

---

### 4.6 Menghapus Data Pasien
Jika terdapat data pendaftaran ganda atau data uji coba:
1. Klik tombol **Hapus** (ikon tempat sampah 🗑️).
2. Kotak dialog konfirmasi akan muncul untuk memastikan Anda tidak menghapus data secara tidak sengaja.
3. Klik **Ya, Hapus** untuk mengonfirmasi penghapusan permanen.

---

## BAB V: LAPORAN & REKAPITULASI PELAYANAN

Modul Laporan dirancang untuk mempermudah pelaporan bulanan ke BKKBN, Dinas Kesehatan, maupun arsip internal faskes.

### 5.1 Membuka Menu Laporan
Klik menu **Laporan Pelayanan** pada navigasi sidebar kiri.

> 📸 **[TEMPAT GAMBAR 5.1: Halaman Laporan Pelayanan KB]**  
> ![Placeholder Halaman Laporan](https://placehold.co/900x500?text=Gambar+5.1+Halaman+Laporan+Pelayanan)

---

### 5.2 Filter Periode Bulan, Tahun & Layanan
1. Pada bilah filter bagian atas:
   - **Pilih Bulan**: Pilih bulan pelaporan (Januari s.d. Desember).
   - **Pilih Tahun**: Pilih tahun pelaporan yang diinginkan.
   - **Filter Layanan**: Pilih opsi *Semua Layanan* atau pilih satu metode tertentu.
2. Klik tombol **Tampilkan Rekap**.
3. Seluruh kartu statistik dan tabel di bawahnya akan otomatis menyesuaikan dengan periode yang Anda tentukan.

---

### 5.3 Ringkasan Rekapitulasi Periode
Halaman ini menyajikan rekap data dalam format ringkas:
- **Total Pasien Periode Ini**: Jumlah keseluruhan pendaftar dalam bulan terpilih.
- **Pelayanan Selesai**: Pasien yang telah sukses mendapatkan tindakan medis.
- **Menunggu / Proses**: Pasien yang masih dalam proses antrean.
- **Kotak Rekapitulasi per Metode KB**: Rincian jumlah total dan selesai untuk masing-masing kontrasepsi (IUD, Implan, Suntik, Pil, Kondom, dll.).

---

### 5.4 Ekspor Laporan ke Microsoft Excel (.CSV)
Untuk mengunduh dokumen laporan yang siap diolah lebih lanjut:
1. Pastikan Anda telah memilih Bulan dan Tahun yang diinginkan.
2. Klik tombol hijau **Ekspor Laporan ke Excel (.CSV)** di sebelah kanan atas.
3. Browser akan otomatis mengunduh berkas dengan nama:  
   `Laporan_Pelayanan_KB_[NamaBulan]_[Tahun].csv`
4. Buka berkas tersebut dengan **Microsoft Excel**.
5. Sistem SIGAP KB telah dilengkapi direktif `sep=;` otomatis, sehingga data akan **langsung terpecah rapi ke dalam 13 kolom terpisah** tanpa menumpuk di satu kolom. Format NIK 16 digit dan nomor telepon juga terjaga utuh tanpa notasi ilmiah (`E+15`) dan tanpa menghilangkan angka `0` di depan.

> 📸 **[TEMPAT GAMBAR 5.2: Hasil Buka File Ekspor di Microsoft Excel]**  
> ![Placeholder Tampilan File Excel Terbuka Rapi](https://placehold.co/900x400?text=Gambar+5.2+Tampilan+Laporan+di+Excel)

---

## BAB VI: MANAJEMEN & CETAK QR CODE

Modul ini berguna untuk memfasilitasi alur pendaftaran mandiri (paperless) di ruang pendaftaran faskes.

### 6.1 Konfigurasi Target URL QR Code
1. Klik menu **Manajemen QR Code** pada sidebar.
2. Anda akan melihat kolom **Target URL Pendaftaran**.
3. Secara default, sistem mengarahkan QR Code ke tautan halaman pendaftaran publik.
4. Jika faskes menggunakan jaringan intranet lokal atau alamat IP khusus (misal `http://192.168.1.100/pelayanan`), ketik alamat tersebut lalu klik **Perbarui QR**.

> 📸 **[TEMPAT GAMBAR 6.1: Halaman Manajemen QR Code]**  
> ![Placeholder Manajemen QR Code](https://placehold.co/900x450?text=Gambar+6.1+Manajemen+QR+Code)

---

### 6.2 Mengunduh File QR Code Vektor (SVG)
1. Pada kartu sebelah kiri, terdapat preview grafis Kode QR.
2. Klik tombol **Unduh File QR Code (SVG)**.
3. File berekstensi `.svg` akan terunduh. Format vektor ini dapat diperbesar ke ukuran berapapun (seperti baliho, spanduk loket, atau brosur) tanpa pecah atau buram.

---

### 6.3 Mencetak Poster A4 untuk Ruang Tunggu
Sistem menyediakan poster siap cetak resmi berukuran A4 yang dirancang elegan dan informatif untuk ditempel di loket faskes:
1. Pada kartu sebelah kanan (**Poster Siap Cetak Ukuran A4**), klik tombol **Buka & Cetak Poster A4**.
2. Tab baru browser akan menampilkan tampilan poster lengkap dengan petunjuk langkah bagi pasien:
   - *Langkah 1*: Buka kamera HP atau aplikasi scanner.
   - *Langkah 2*: Arahkan ke QR Code.
   - *Langkah 3*: Isi data diri & dapatkan nomor antrean.
3. Tekan kombinasi tombol **Ctrl + P** (atau klik tombol cetak) untuk langsung mencetaknya ke mesin printer faskes.

> 📸 **[TEMPAT GAMBAR 6.2: Pratinjau Desain Poster A4 Siap Cetak]**  
> ![Placeholder Desain Poster A4](https://placehold.co/600x800?text=Gambar+6.2+Desain+Poster+A4+Siap+Cetak)

---

## BAB VII: MANAJEMEN KATALOG LAYANAN KB

Modul ini digunakan untuk mengelola informasi edukasi dan ketersediaan stok/layanan kontrasepsi yang tampil kepada masyarakat.

### 7.1 Melihat Daftar Layanan Kontrasepsi
Klik menu **Katalog Layanan** pada sidebar kiri. Anda akan melihat tabel daftar kontrasepsi yang tersedia di faskes:
- Urutan tampilan
- Nama metode kontrasepsi
- Kategori (MKJP / Non-MKJP, Hormonal / Non-Hormonal)
- Masa efektif (misal 8-10 tahun untuk IUD, 3 tahun untuk Implan)
- Tingkat efektivitas (misal 99.2%)
- Total pasien yang menggunakan
- Status layanan (**Aktif** atau **Non-aktif**)

> 📸 **[TEMPAT GAMBAR 7.1: Halaman Katalog Layanan KB]**  
> ![Placeholder Katalog Layanan KB](https://placehold.co/900x450?text=Gambar+7.1+Katalog+Layanan+KB)

---

### 7.2 Mengaktifkan / Menonaktifkan Layanan
Jika suatu metode KB sedang habis stok atau sementara tidak tersedia di faskes:
1. Temukan layanan tersebut pada tabel.
2. Pada kolom **Status**, klik tombol badge **Aktif / Non-aktif**.
3. Status akan langsung berganti:
   - Jika **Non-aktif**: Layanan tersebut tidak akan muncul sebagai pilihan di formulir pendaftaran mandiri pasien.
   - Jika stok sudah tersedia kembali, klik sekali lagi tombol tersebut untuk mengaktifkannya kembali (**Aktif**).

---

### 7.3 Mengubah Rincian & Informasi Medis Layanan
Untuk mengedit penjelasan edukatif kontrasepsi:
1. Klik tombol **Edit** di baris layanan yang bersangkutan.
2. Pada formulir pengeditan, Anda dapat memperbarui:
   - Nama Layanan & Kategori
   - Deskripsi Singkat & Deskripsi Medis Lengkap
   - Masa Efektif & Tingkat Efektivitas
   - Kelebihan / Manfaat Kontrasepsi
   - Efek Samping yang Perlu Diketahui Pasien
   - Persyaratan / Kontraindikasi Medis
3. Klik tombol **Simpan Perubahan Layanan**. Data edukasi publik akan langsung terupdate.

> 📸 **[TEMPAT GAMBAR 7.2: Formulir Edit Rincian Layanan KB]**  
> ![Placeholder Formulir Edit Layanan KB](https://placehold.co/800x550?text=Gambar+7.2+Formulir+Edit+Layanan)

---

## BAB VIII: TANYA JAWAB & PANDUAN PEMECAHAN MASALAH (FAQ)

### Q1: Pasien datang ke loket tetapi lupa membawa karcis / bukti pendaftaran. Bagaimana cara mencarinya?
> **Jawaban:**  
> Petugas tidak perlu panik. Masuk ke menu **Data Pasien**, kemudian pada kolom pencarian masukkan **NIK 16 digit** atau **Nama Pasien** yang bersangkutan. Tekan tombol **Terapkan Filter**. Data pasien akan langsung ditemukan lengkap dengan nomor registrasinya.

---

### Q2: Saat membuka berkas hasil ekspor laporan di Excel, apakah format NIK atau nomor HP akan berubah menjadi notasi ilmiah (3.201E+15)?
> **Jawaban:**  
> **Tidak.** Sistem SIGAP KB telah menerapkan enkapsulasi formula teks standar Excel (`="3201..."`). Angka 16 digit NIK akan tampil penuh dan angka 0 di depan nomor handphone tidak akan terpotong.

---

### Q3: Bagaimana jika ada kolom laporan yang bertumpuk pada Excel versi lama?
> **Jawaban:**  
> Sistem telah menyertakan instruksi `sep=;` di baris pertama CSV secara otomatis. Jika di komputer Anda masih belum terpisah karena pengaturan regional khusus, buka Excel baru, pilih menu **Data** → **From Text/CSV**, lalu pilih pemisah **Semicolon (Titik Koma)**.

---

### Q4: Apakah data pasien yang sudah dihapus bisa dikembalikan?
> **Jawaban:**  
> Penghapusan data pasien bersifat permanen. Harap selalu berhati-hati sebelum menekan tombol konfirmasi hapus data.

---

### Q5: Bagaimana cara menghubungi pasien yang belum hadir saat jam pelayanan?
> **Jawaban:**  
> Buka menu **Data Pasien** → klik **Detail** pada pasien tersebut. Pada bagian nomor telepon / WhatsApp, klik tautan nomor tersebut. Sistem akan membuka aplikasi WhatsApp untuk mengirimkan pesan konfirmasi kedatangan secara langsung.

---

*Dokumen ini disusun untuk Sistem Informasi SIGAP KB.*  
*Hak Cipta © 2026 Tim Pengembang SIGAP KB.*
