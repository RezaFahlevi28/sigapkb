<?php

namespace App\Http\Controllers;

use App\Models\KbService;
use App\Models\PatientRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the landing page with service overview and quick access.
     */
    public function index(): View
    {
        $services = KbService::active()->get();
        $totalServices = $services->count();
        $servedPatientsCount = PatientRegistration::where('status', 'selesai')->count();
        $todayPatientsCount = PatientRegistration::whereDate('service_date', today())->count();

        return view('pages.home', [
            'services' => $services,
            'totalServices' => $totalServices,
            'servedPatientsCount' => $servedPatientsCount,
            'todayPatientsCount' => $todayPatientsCount,
        ]);
    }

    /**
     * Display the detailed KB services information page.
     */
    public function services(): View
    {
        $services = KbService::active()->get();

        return view('pages.services', [
            'services' => $services,
        ]);
    }

    /**
     * Search patient registration status or ticket by NIK or Registration Number.
     */
    public function checkTicket(Request $request): View|RedirectResponse
    {
        $query = $request->input('search');

        if (blank($query)) {
            return view('pages.check-ticket', [
                'searched' => false,
                'registrations' => collect(),
            ]);
        }

        $registrations = PatientRegistration::with('kbService')
            ->where(function ($sub) use ($query) {
                $sub->where('registration_number', $query)
                    ->orWhere('nik', $query);
            })
            ->latest()
            ->get();

        return view('pages.check-ticket', [
            'searched' => true,
            'query' => $query,
            'registrations' => $registrations,
        ]);
    }
}
