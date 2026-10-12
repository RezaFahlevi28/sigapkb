<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\QrCodeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QrCodeController extends Controller
{
    /**
     * Display the QR Code management and customization page.
     */
    public function index(Request $request, QrCodeService $qrCodeService): View
    {
        $defaultUrl = route('pelayanan.register');
        $targetUrl = $request->input('target_url', $defaultUrl);

        $qrCodeDataUri = $qrCodeService->generateSvgDataUri($targetUrl, 8);
        $qrCodeRawSvg = $qrCodeService->generateRawSvg($targetUrl, 8);

        return view('admin.qrcode.index', [
            'targetUrl' => $targetUrl,
            'defaultUrl' => $defaultUrl,
            'qrCodeDataUri' => $qrCodeDataUri,
            'qrCodeRawSvg' => $qrCodeRawSvg,
        ]);
    }

    /**
     * Download the QR code as a standalone SVG vector image file.
     */
    public function download(Request $request, QrCodeService $qrCodeService): Response
    {
        $defaultUrl = route('pelayanan.register');
        $targetUrl = $request->input('target_url', $defaultUrl);
        $svgContent = $qrCodeService->generateRawSvg($targetUrl, 10);

        return response($svgContent, 200, [
            'Content-Type' => 'image/svg+xml',
            'Content-Disposition' => 'attachment; filename="qrcode-pelayanan-kb.svg"',
        ]);
    }

    /**
     * Display printable official hospital poster (A4 format).
     */
    public function printPoster(Request $request, QrCodeService $qrCodeService): View
    {
        $defaultUrl = route('pelayanan.register');
        $targetUrl = $request->input('target_url', $defaultUrl);
        $facilityName = $request->input('facility_name', 'FASILITAS PELAYANAN KESEHATAN');

        $qrCodeRawSvg = $qrCodeService->generateRawSvg($targetUrl, 10);

        return view('admin.qrcode.poster', [
            'targetUrl' => $targetUrl,
            'facilityName' => $facilityName,
            'qrCodeRawSvg' => $qrCodeRawSvg,
        ]);
    }
}
