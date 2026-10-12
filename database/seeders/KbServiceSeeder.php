<?php

namespace Database\Seeders;

use App\Models\KbService;
use Illuminate\Database\Seeder;

class KbServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'IUD (Intrauterine Device)',
                'slug' => 'iud',
                'category' => 'Metode Kontrasepsi Jangka Panjang (MKJP)',
                'short_description' => 'Alat kontrasepsi berbahan tembaga/hormon yang dipasang di dalam rahim untuk mencegah pembuahan secara efektif hingga 10 tahun.',
                'full_description' => 'IUD (Intrauterine Device) atau spiral adalah alat kontrasepsi berukuran kecil menyerupai huruf T yang dimasukkan ke dalam rahim oleh tenaga medis terlatih. Sangat cocok untuk ibu yang ingin menjarangkan kehamilan dalam jangka panjang tanpa repot mengingat jadwal minum obat.',
                'effectiveness' => '99.4% Sangat Efektif',
                'duration' => '5 - 10 Tahun (Dapat dilepas sewaktu-waktu)',
                'procedure_instructions' => 'Dianjurkan dipasang saat sedang menstruasi atau segera setelah melahirkan. Dilakukan pemeriksaan panggul terlebih dahulu oleh bidan/dokter.',
                'advantages' => [
                    'Perlindungan sangat panjang tanpa perawatan harian',
                    'Tidak mempengaruhi kesuburan masa depan setelah dilepas',
                    'Aman untuk ibu menyusui (khususnya IUD non-hormonal)',
                    'Efisiensi biaya dan tidak mengganggu aktivitas seksual',
                ],
                'side_effects' => [
                    'Perubahan pola menstruasi atau flek pada beberapa bulan pertama',
                    'Kram ringan beberapa hari setelah pemasangan',
                ],
                'icon' => 'sparkles',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Implan (Susuk KB)',
                'slug' => 'implan',
                'category' => 'Metode Kontrasepsi Jangka Panjang (MKJP)',
                'short_description' => 'Batang fleksibel kecil yang dipasang di bawah kulit lengan atas untuk pelepasan hormon progestin pencegah ovulasi.',
                'full_description' => 'Implan KB adalah tabung lentur seukuran batang korek api yang disisipkan di bawah kulit lengan atas. Bekerja dengan melepaskan hormon progestin secara bertahap untuk mencegah pelepasan sel telur dan mengentalkan lendir leher rahim.',
                'effectiveness' => '99.5% Sangat Efektif',
                'duration' => '3 Tahun',
                'procedure_instructions' => 'Pemasangan cepat sekitar 10-15 menit dengan bius lokal pada lengan non-dominan oleh bidan/dokter bersertifikat.',
                'advantages' => [
                    'Sangat praktis dan efektif selama 3 tahun penuh',
                    'Tidak memerlukan tindakan saat berhubungan intim',
                    'Bisa dilepas kapan saja jika ingin segera hamil',
                    'Aman digunakan oleh ibu yang sedang menyusui',
                ],
                'side_effects' => [
                    'Siklus haid tidak teratur atau tidak haid sementara',
                    'Sedikit memar ringan di area suntik/pemasangan',
                ],
                'icon' => 'shield-check',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Suntikan KB',
                'slug' => 'suntikan-kb',
                'category' => 'Non-MKJP / Hormonal',
                'short_description' => 'Injeksi hormon progestin (atau kombinasi) setiap 1 atau 3 bulan secara berkala untuk menekan ovulasi.',
                'full_description' => 'Suntik KB adalah metode kontrasepsi hormonal yang disuntikkan ke area otot panggul/bokong. Tersedia pilihan 1 bulan (kombinasi) dan 3 bulan (progestin) yang sangat populer karena praktis dan terjangkau.',
                'effectiveness' => '97% - 99% Efektif',
                'duration' => '1 Bulan atau 3 Bulan (Suntik Ulang Berkala)',
                'procedure_instructions' => 'Disuntikkan pada 7 hari pertama siklus menstruasi. Wajib kontrol kembali tepat waktu sesuai tanggal di kartu KB.',
                'advantages' => [
                    'Praktis tanpa perlu minum obat setiap hari',
                    'Suntik 3 bulan tidak mengganggu produksi ASI',
                    'Membantu meredakan nyeri haid (suntik kombinasi)',
                ],
                'side_effects' => [
                    'Perubahan pola haid atau spotting',
                    'Kenaikan berat badan pada beberapa pengguna',
                    'Perlu disiplin mengingat jadwal kunjungan ulang',
                ],
                'icon' => 'heart',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Pil KB',
                'slug' => 'pil-kb',
                'category' => 'Non-MKJP / Hormonal',
                'short_description' => 'Obat oral harian yang mengandung hormon untuk mencegah ovulasi dan mengentalkan lendir serviks.',
                'full_description' => 'Pil KB merupakan kontrasepsi oral yang diminum setiap hari pada waktu yang sama. Sangat fleksibel dan cepat mengembalikan masa subur saat pengguna memutuskan berhenti.',
                'effectiveness' => '91% - 99% (Tergantung Kepatuhan Konsumsi)',
                'duration' => 'Harian (1 blister habis per siklus haid)',
                'procedure_instructions' => 'Diminum setiap hari pada jam yang sama (misalnya setiap sebelum tidur). Tersedia pilihan pil kombinasi dan pil menyusui (progestin only).',
                'advantages' => [
                    'Sangat fleksibel, kesuburan pulih dengan cepat',
                    'Siklus haid menjadi lebih teratur dan mengurangi kram haid',
                    'Bisa dihentikan mandiri kapan saja',
                ],
                'side_effects' => [
                    'Mual ringan pada awal konsumsi',
                    'Efektivitas turun drastis jika sering lupa minum',
                ],
                'icon' => 'calendar',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Kondom',
                'slug' => 'kondom',
                'category' => 'Metode Barier',
                'short_description' => 'Metode barier sekali pakai yang menghalangi sperma masuk dan memberi perlindungan ganda terhadap IMS.',
                'full_description' => 'Kondom adalah selubung lateks tipis yang digunakan pria saat berhubungan intim. Selain mencegah kehamilan, ini adalah satu-satunya metode kontrasepsi yang sekaligus mencegah penularan Infeksi Menular Seksual (IMS/HIV).',
                'effectiveness' => '85% - 98% (Penggunaan yang Benar)',
                'duration' => 'Sekali Pakai (Tiap kali berhubungan intim)',
                'procedure_instructions' => 'Gunakan kondom baru yang tidak kadaluarsa sebelum terjadi kontak genital. Simpan di tempat sejuk dan terhindar dari panas matahari.',
                'advantages' => [
                    'Satu-satunya metode yang melindungi dari Infeksi Menular Seksual (IMS)',
                    'Bebas efek samping hormonal sama sekali',
                    'Mudah didapatkan tanpa perlu tindakan medis khusus',
                    'Praktis dan siap pakai',
                ],
                'side_effects' => [
                    'Kemungkinan alergi lateks pada orang tertentu',
                    'Risiko robek atau lepas bila cara pakai kurang tepat',
                ],
                'icon' => 'check-circle',
                'is_active' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($services as $service) {
            KbService::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
