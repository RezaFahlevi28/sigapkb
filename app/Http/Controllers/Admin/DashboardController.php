<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KbService;
use App\Models\PatientRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    /**
     * Display the admin overview dashboard with key metrics and service statistics.
     */
    public function index(): View
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $today = Carbon::today()->toDateString();

        // Key counts
        $totalPatients = PatientRegistration::count();
        $thisMonthPatients = PatientRegistration::whereMonth('service_date', $currentMonth)
            ->whereYear('service_date', $currentYear)
            ->count();
        $todayPatients = PatientRegistration::whereDate('service_date', $today)->count();
        $pendingPatients = PatientRegistration::where('status', 'menunggu')->count();
        $completedPatients = PatientRegistration::where('status', 'selesai')->count();

        // Services breakdown with patient counts
        $services = KbService::withCount([
            'patientRegistrations as total_count',
            'patientRegistrations as current_month_count' => function ($query) use ($currentMonth, $currentYear) {
                $query->whereMonth('service_date', $currentMonth)
                    ->whereYear('service_date', $currentYear);
            },
        ])->get();

        // Recent 7 registrations
        $recentRegistrations = PatientRegistration::with('kbService')
            ->latest('id')
            ->take(8)
            ->get();

        // Monthly recap breakdown for the current year
        $monthlyTrends = PatientRegistration::selectRaw("strftime('%m', service_date) as month_num, count(*) as total")
            ->whereYear('service_date', $currentYear)
            ->groupBy('month_num')
            ->pluck('total', 'month_num')
            ->toArray();

        return view('admin.dashboard', [
            'totalPatients' => $totalPatients,
            'thisMonthPatients' => $thisMonthPatients,
            'todayPatients' => $todayPatients,
            'pendingPatients' => $pendingPatients,
            'completedPatients' => $completedPatients,
            'services' => $services,
            'recentRegistrations' => $recentRegistrations,
            'currentMonthName' => Carbon::now()->translatedFormat('F Y'),
            'monthlyTrends' => $monthlyTrends,
        ]);
    }
}
