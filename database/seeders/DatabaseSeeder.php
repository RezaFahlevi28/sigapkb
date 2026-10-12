<?php

namespace Database\Seeders;

use App\Models\KbService;
use App\Models\PatientRegistration;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Default Admin
        User::updateOrCreate(
            ['email' => 'admin@sigapkb.test'],
            [
                'name' => 'Petugas Administrasi KB',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Contraceptive Services
        $this->call(KbServiceSeeder::class);

        // 3. Seed Sample Patient Data for Demo & Analytics
        $services = KbService::all()->keyBy('slug');

        $samplePatients = [
            [
                'patient_name' => 'Siti Aminah',
                'husband_name' => 'Budi Santoso',
                'nik' => '3201124508920001',
                'birth_date' => '1995-08-14',
                'phone_number' => '081234567890',
                'address' => 'Jl. Melati No. 12, RT 02/RW 04, Kel. Sukamaju',
                'kb_service_id' => $services['iud']->id,
                'service_date' => now()->toDateString(),
                'kb_history' => 'Peserta Baru',
                'status' => 'selesai',
                'notes' => 'Pemasangan IUD Cooper T berjalan lancar, kontrol 1 bulan lagi.',
            ],
            [
                'patient_name' => 'Dewi Sartika',
                'husband_name' => 'Agus Prayitno',
                'nik' => '3201125203940003',
                'birth_date' => '1994-03-22',
                'phone_number' => '081298765432',
                'address' => 'Kp. Babakan RT 01/RW 02, Ds. Mekarsari',
                'kb_service_id' => $services['implan']->id,
                'service_date' => now()->toDateString(),
                'kb_history' => 'Ganti Cara',
                'status' => 'dilayani',
                'notes' => 'Ganti cara dari suntik 3 bulan ke implan.',
            ],
            [
                'patient_name' => 'Rina Marlina',
                'husband_name' => 'Dedi Suryadi',
                'nik' => '3201126105970002',
                'birth_date' => '1997-05-18',
                'phone_number' => '085712345678',
                'address' => 'Jl. Kenanga No. 8, Perum Grand Harmoni Blok C4',
                'kb_service_id' => $services['suntikan-kb']->id,
                'service_date' => now()->toDateString(),
                'kb_history' => 'Peserta Ulangan',
                'status' => 'menunggu',
                'notes' => 'Kunjungan rutin suntik 3 bulan (Depo Progestin).',
            ],
            [
                'patient_name' => 'Nurul Hidayah',
                'husband_name' => 'Faisal Rahman',
                'nik' => '3201124810960005',
                'birth_date' => '1996-10-09',
                'phone_number' => '087811223344',
                'address' => 'Jl. Cendrawasih No. 25, RT 05/RW 01',
                'kb_service_id' => $services['pil-kb']->id,
                'service_date' => now()->subDays(2)->toDateString(),
                'kb_history' => 'Peserta Baru',
                'status' => 'selesai',
                'notes' => 'Diberikan Pil Kombinasi 1 siklus dan konseling kepatuhan minum.',
            ],
            [
                'patient_name' => 'Anisa Rahmawati',
                'husband_name' => 'Hendra Gunawan',
                'nik' => '3201127007990004',
                'birth_date' => '1999-07-30',
                'phone_number' => '089655443322',
                'address' => 'Dusun Karang Tengah RT 03/RW 06',
                'kb_service_id' => $services['kondom']->id,
                'service_date' => now()->subDays(5)->toDateString(),
                'kb_history' => 'Peserta Baru',
                'status' => 'selesai',
                'notes' => 'Pengambilan kondom dan edukasi kesehatan reproduksi.',
            ],
            [
                'patient_name' => 'Fitri Handayani',
                'husband_name' => 'Irfan Hakim',
                'nik' => '3201125501930007',
                'birth_date' => '1993-01-15',
                'phone_number' => '082112344321',
                'address' => 'Jl. Dahlia No. 4, RT 04/RW 02',
                'kb_service_id' => $services['iud']->id,
                'service_date' => now()->subDays(7)->toDateString(),
                'kb_history' => 'Peserta Ulangan',
                'status' => 'selesai',
                'notes' => 'Kontrol benang IUD pasca 1 tahun pemasangan, posisi baik.',
            ],
            [
                'patient_name' => 'Yuni Astuti',
                'husband_name' => 'Joko Widodo',
                'nik' => '3201126604950008',
                'birth_date' => '1995-04-26',
                'phone_number' => '085298877665',
                'address' => 'Kp. Pasir Angin No. 17',
                'kb_service_id' => $services['suntikan-kb']->id,
                'service_date' => now()->subDays(10)->toDateString(),
                'kb_history' => 'Peserta Ulangan',
                'status' => 'selesai',
                'notes' => 'Suntik KB 1 bulan siklis.',
            ],
        ];

        foreach ($samplePatients as $index => $patient) {
            $regDate = str_replace('-', '', $patient['service_date']);
            $seq = str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT);
            $regNum = "KB-{$regDate}-{$seq}";

            PatientRegistration::updateOrCreate(
                ['registration_number' => $regNum],
                array_merge($patient, ['registration_number' => $regNum])
            );
        }
    }
}
