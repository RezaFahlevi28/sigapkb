<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatientRegistrationRequest;
use App\Models\KbService;
use App\Models\PatientRegistration;
use App\Services\QrCodeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display the patient registration form.
     */
    public function create(Request $request): View
    {
        $services = KbService::active()->get();
        $selectedServiceSlug = $request->query('service');
        $selectedService = $selectedServiceSlug
            ? $services->firstWhere('slug', $selectedServiceSlug)
            : null;

        return view('pages.register', [
            'services' => $services,
            'selectedService' => $selectedService,
        ]);
    }

    /**
     * Store a newly created patient registration.
     */
    public function store(StorePatientRegistrationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['registration_number'] = PatientRegistration::generateRegistrationNumber();
        $validated['status'] = 'menunggu';

        $registration = PatientRegistration::create($validated);

        return redirect()
            ->route('pelayanan.success', $registration->registration_number)
            ->with('status', 'Pendaftaran pelayanan KB Anda berhasil dikirim! Simpan atau unduh nomor registrasi ini.');
    }

    /**
     * Display the registration success page with digital ticket.
     */
    public function success(string $registrationNumber, QrCodeService $qrCodeService): View
    {
        $registration = PatientRegistration::with('kbService')
            ->where('registration_number', $registrationNumber)
            ->firstOrFail();

        $qrPayload = route('pelayanan.success', $registration->registration_number);
        $qrCodeDataUri = $qrCodeService->generateSvgDataUri($qrPayload, 5);

        return view('pages.register-success', [
            'registration' => $registration,
            'qrCodeDataUri' => $qrCodeDataUri,
        ]);
    }

    /**
     * Display print-ready view of registration proof.
     */
    public function print(string $registrationNumber, QrCodeService $qrCodeService): View
    {
        $registration = PatientRegistration::with('kbService')
            ->where('registration_number', $registrationNumber)
            ->firstOrFail();

        $qrPayload = route('pelayanan.success', $registration->registration_number);
        $qrCodeRawSvg = $qrCodeService->generateRawSvg($qrPayload, 4);

        return view('pages.register-print', [
            'registration' => $registration,
            'qrCodeRawSvg' => $qrCodeRawSvg,
        ]);
    }
}
