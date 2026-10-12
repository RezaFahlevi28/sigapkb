<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePatientRegistrationRequest;
use App\Models\KbService;
use App\Models\PatientRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of patient registrations with filtering, searching, and pagination.
     */
    public function index(Request $request): View
    {
        $search = $request->query('search');
        $serviceId = $request->query('service_id');
        $status = $request->query('status');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $query = PatientRegistration::with('kbService')
            ->search($search);

        if (filled($serviceId)) {
            $query->where('kb_service_id', $serviceId);
        }

        if (filled($status)) {
            $query->where('status', $status);
        }

        if (filled($startDate)) {
            $query->whereDate('service_date', '>=', $startDate);
        }

        if (filled($endDate)) {
            $query->whereDate('service_date', '<=', $endDate);
        }

        $patients = $query->latest('service_date')
            ->latest('id')
            ->paginate(15)
            ->withQueryString();

        $services = KbService::orderBy('name')->get();

        return view('admin.patients.index', [
            'patients' => $patients,
            'services' => $services,
            'filters' => [
                'search' => $search,
                'service_id' => $serviceId,
                'status' => $status,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ],
        ]);
    }

    /**
     * Display the specified patient detail.
     */
    public function show(PatientRegistration $patient): View
    {
        $patient->load('kbService');

        return view('admin.patients.show', [
            'patient' => $patient,
        ]);
    }

    /**
     * Show the form for editing the patient record.
     */
    public function edit(PatientRegistration $patient): View
    {
        $services = KbService::active()->get();

        return view('admin.patients.edit', [
            'patient' => $patient,
            'services' => $services,
        ]);
    }

    /**
     * Update the patient record in storage.
     */
    public function update(UpdatePatientRegistrationRequest $request, PatientRegistration $patient): RedirectResponse
    {
        $patient->update($request->validated());

        return redirect()
            ->route('admin.patients.index')
            ->with('status', "Data pasien {$patient->patient_name} ({$patient->registration_number}) berhasil diperbarui.");
    }

    /**
     * Quickly update the status of a patient registration.
     */
    public function updateStatus(Request $request, PatientRegistration $patient): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'string', 'in:menunggu,dilayani,selesai,batal'],
        ]);

        $patient->update([
            'status' => $request->input('status'),
        ]);

        return back()->with('status', "Status pasien {$patient->patient_name} diubah menjadi {$patient->status}.");
    }

    /**
     * Remove the specified patient registration.
     */
    public function destroy(PatientRegistration $patient): RedirectResponse
    {
        $name = $patient->patient_name;
        $number = $patient->registration_number;

        $patient->delete();

        return redirect()
            ->route('admin.patients.index')
            ->with('status', "Data pasien {$name} ({$number}) berhasil dihapus.");
    }
}
