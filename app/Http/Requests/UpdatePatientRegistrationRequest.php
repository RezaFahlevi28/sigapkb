<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'patient_name' => ['required', 'string', 'max:255'],
            'husband_name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'digits:16'],
            'birth_date' => ['required', 'date', 'before:today'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:1000'],
            'kb_service_id' => ['required', 'exists:kb_services,id'],
            'service_date' => ['required', 'date'],
            'kb_history' => ['required', 'string', 'in:Peserta Baru,Peserta Ulangan,Ganti Cara'],
            'status' => ['required', 'string', 'in:menunggu,dilayani,selesai,batal'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'patient_name' => 'nama lengkap pasien',
            'husband_name' => 'nama suami',
            'nik' => 'NIK',
            'birth_date' => 'tanggal lahir',
            'phone_number' => 'nomor HP / WhatsApp',
            'address' => 'alamat lengkap',
            'kb_service_id' => 'jenis layanan KB',
            'service_date' => 'tanggal pelayanan',
            'kb_history' => 'riwayat KB',
            'status' => 'status pelayanan',
            'notes' => 'catatan',
        ];
    }
}
