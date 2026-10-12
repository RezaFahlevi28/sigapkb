<?php

namespace Tests\Feature;

use App\Models\KbService;
use App\Models\PatientRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientRegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_can_view_home_page_and_see_kb_services(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('SIGAP');
        $response->assertSee('IUD (Intrauterine Device)');
    }

    public function test_can_view_services_information_page(): void
    {
        $response = $this->get(route('services.index'));

        $response->assertStatus(200);
        $response->assertSee('Petunjuk Pengisian Formulir Pelayanan KB');
        $response->assertSee('Implan (Susuk KB)');
    }

    public function test_can_submit_patient_registration_successfully(): void
    {
        $service = KbService::first();

        $payload = [
            'patient_name' => 'Ratna Sari',
            'husband_name' => 'Bambang Irawan',
            'nik' => '3201124508920999',
            'birth_date' => '1996-04-12',
            'phone_number' => '081299887766',
            'address' => 'Jl. Anggrek No. 10, RT 01/RW 03, Kel. Mawar',
            'kb_service_id' => $service->id,
            'service_date' => now()->toDateString(),
            'kb_history' => 'Peserta Baru',
            'notes' => 'Pendaftaran online mandiri.',
        ];

        $response = $this->post(route('pelayanan.store'), $payload);

        $this->assertDatabaseHas('patient_registrations', [
            'patient_name' => 'Ratna Sari',
            'nik' => '3201124508920999',
            'kb_service_id' => $service->id,
        ]);

        $created = PatientRegistration::where('nik', '3201124508920999')->first();
        $this->assertNotNull($created);
        $response->assertRedirect(route('pelayanan.success', $created->registration_number));
    }

    public function test_fails_registration_when_nik_is_invalid(): void
    {
        $service = KbService::first();

        $response = $this->post(route('pelayanan.store'), [
            'patient_name' => 'Ratna Sari',
            'husband_name' => 'Bambang Irawan',
            'nik' => '123', // Invalid digits
            'birth_date' => '1996-04-12',
            'address' => 'Jl. Anggrek No. 10',
            'kb_service_id' => $service->id,
            'service_date' => now()->toDateString(),
            'kb_history' => 'Peserta Baru',
        ]);

        $response->assertSessionHasErrors(['nik']);
    }

    public function test_can_search_and_check_ticket_by_nik(): void
    {
        $patient = PatientRegistration::first();

        $response = $this->get(route('pelayanan.check', ['search' => $patient->nik]));

        $response->assertStatus(200);
        $response->assertSee($patient->registration_number);
        $response->assertSee($patient->patient_name);
    }
}
