<?php

namespace Tests\Feature;

use App\Models\KbService;
use App\Models\PatientRegistration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPelayananKbTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_guests_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_login_successfully(): void
    {
        $response = $this->post(route('login.post'), [
            'email' => 'admin@sigapkb.test',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_admin_can_view_dashboard_with_statistics(): void
    {
        $admin = User::first();

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Dashboard Ringkasan Pelayanan');
        $response->assertSee('Jumlah Pasien Berdasarkan Jenis Layanan KB');
    }

    public function test_admin_can_filter_and_search_patients(): void
    {
        $admin = User::first();
        $patient = PatientRegistration::first();

        $response = $this->actingAs($admin)->get(route('admin.patients.index', [
            'search' => $patient->nik,
        ]));

        $response->assertStatus(200);
        $response->assertSee($patient->patient_name);
        $response->assertSee($patient->registration_number);
    }

    public function test_admin_can_update_patient_record(): void
    {
        $admin = User::first();
        $patient = PatientRegistration::first();
        $service = KbService::first();

        $response = $this->actingAs($admin)->put(route('admin.patients.update', $patient->id), [
            'patient_name' => 'Nama Pasien Telah Dikoreksi',
            'husband_name' => $patient->husband_name,
            'nik' => $patient->nik,
            'birth_date' => $patient->birth_date->format('Y-m-d'),
            'address' => 'Alamat baru hasil revisi',
            'kb_service_id' => $service->id,
            'service_date' => $patient->service_date->format('Y-m-d'),
            'kb_history' => 'Ganti Cara',
            'status' => 'dilayani',
        ]);

        $response->assertRedirect(route('admin.patients.index'));

        $patient->refresh();
        $this->assertEquals('Nama Pasien Telah Dikoreksi', $patient->patient_name);
        $this->assertEquals('dilayani', $patient->status);
    }

    public function test_admin_can_export_report_as_csv(): void
    {
        $admin = User::first();

        $response = $this->actingAs($admin)->get(route('admin.reports.export', [
            'month' => now()->month,
            'year' => now()->year,
        ]));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'text/csv; charset=UTF-8');

        $content = $response->streamedContent();
        $this->assertStringContainsString('sep=;', $content);
        $this->assertStringContainsString('No.;"No. Registrasi";"Tanggal Pelayanan"', $content);
    }

    public function test_admin_can_download_qr_code_svg(): void
    {
        $admin = User::first();

        $response = $this->actingAs($admin)->get(route('admin.qrcode.download'));

        $response->assertStatus(200);
        $response->assertHeader('content-type', 'image/svg+xml');
        $this->assertStringContainsString('<svg', $response->getContent());
    }
}
