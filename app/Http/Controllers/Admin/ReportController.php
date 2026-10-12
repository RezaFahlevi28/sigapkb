<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KbService;
use App\Models\PatientRegistration;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportController extends Controller
{
    /**
     * Display the monthly/yearly report recap and breakdown by contraceptive type.
     */
    public function index(Request $request): View
    {
        $selectedMonth = (int) ($request->query('month') ?? Carbon::now()->month);
        $selectedYear = (int) ($request->query('year') ?? Carbon::now()->year);
        $serviceId = $request->query('service_id');

        $query = PatientRegistration::with('kbService')
            ->whereMonth('service_date', $selectedMonth)
            ->whereYear('service_date', $selectedYear);

        if (filled($serviceId)) {
            $query->where('kb_service_id', $serviceId);
        }

        $records = $query->orderBy('service_date')->get();

        // Summary counts per service
        $servicesSummary = KbService::withCount([
            'patientRegistrations as total_in_period' => function ($sub) use ($selectedMonth, $selectedYear) {
                $sub->whereMonth('service_date', $selectedMonth)
                    ->whereYear('service_date', $selectedYear);
            },
            'patientRegistrations as completed_in_period' => function ($sub) use ($selectedMonth, $selectedYear) {
                $sub->whereMonth('service_date', $selectedMonth)
                    ->whereYear('service_date', $selectedYear)
                    ->where('status', 'selesai');
            },
        ])->get();

        $allServices = KbService::orderBy('name')->get();

        // Calculate available years for dropdown (e.g., current year down to 3 years back)
        $years = range(Carbon::now()->year + 1, Carbon::now()->year - 3);

        return view('admin.reports.index', [
            'records' => $records,
            'servicesSummary' => $servicesSummary,
            'allServices' => $allServices,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'selectedServiceId' => $serviceId,
            'years' => $years,
            'totalInPeriod' => $records->count(),
            'completedInPeriod' => $records->where('status', 'selesai')->count(),
            'pendingInPeriod' => $records->where('status', 'menunggu')->count(),
        ]);
    }

    /**
     * Export the filtered report records to an Excel-compatible CSV with UTF-8 BOM.
     */
    public function exportExcel(Request $request): StreamedResponse
    {
        $selectedMonth = (int) ($request->query('month') ?? Carbon::now()->month);
        $selectedYear = (int) ($request->query('year') ?? Carbon::now()->year);
        $serviceId = $request->query('service_id');

        $query = PatientRegistration::with('kbService')
            ->whereMonth('service_date', $selectedMonth)
            ->whereYear('service_date', $selectedYear);

        if (filled($serviceId)) {
            $query->where('kb_service_id', $serviceId);
        }

        $records = $query->orderBy('service_date')->get();

        $monthName = Carbon::createFromDate($selectedYear, $selectedMonth, 1)->translatedFormat('F');
        $fileName = "Laporan_Pelayanan_KB_{$monthName}_{$selectedYear}.csv";

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        return response()->stream(function () use ($records) {
            $output = fopen('php://output', 'w');

            // Write UTF-8 BOM for Microsoft Excel compatibility
            fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));

            // Explicitly instruct Microsoft Excel to use semicolon (;) delimiter across all system locales
            fwrite($output, "sep=;\r\n");

            // Column Header
            fputcsv($output, [
                'No.',
                'No. Registrasi',
                'Tanggal Pelayanan',
                'Nama Lengkap Pasien',
                'Nama Suami',
                'NIK',
                'Tanggal Lahir',
                'No. Telepon / WA',
                'Alamat Pasien',
                'Layanan KB',
                'Riwayat KB',
                'Status Pelayanan',
                'Catatan Tambahan',
            ], ';');

            $index = 1;
            foreach ($records as $item) {
                fputcsv($output, [
                    $index++,
                    $item->registration_number,
                    $item->service_date ? $item->service_date->format('d/m/Y') : '-',
                    $item->patient_name,
                    $item->husband_name,
                    $item->nik ? '="'.$item->nik.'"' : '-',
                    $item->birth_date ? $item->birth_date->format('d/m/Y') : '-',
                    $item->phone_number ? '="'.$item->phone_number.'"' : '-',
                    $item->address,
                    $item->kbService ? $item->kbService->name : '-',
                    $item->kb_history,
                    ucfirst($item->status),
                    $item->notes ?? '-',
                ], ';');
            }

            fclose($output);
        }, 200, $headers);
    }
}
