<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KbServiceManagementController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Pasien & Pengunjung)
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/informasi-layanan', [HomeController::class, 'services'])->name('services.index');
Route::get('/cek-bukti', [HomeController::class, 'checkTicket'])->name('pelayanan.check');

Route::get('/pelayanan', [RegistrationController::class, 'create'])->name('pelayanan.register');
Route::post('/pelayanan', [RegistrationController::class, 'store'])->name('pelayanan.store');
Route::get('/pelayanan/sukses/{registration_number}', [RegistrationController::class, 'success'])->name('pelayanan.success');
Route::get('/pelayanan/cetak/{registration_number}', [RegistrationController::class, 'print'])->name('pelayanan.print');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Data Pasien
    Route::get('/pasien', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/pasien/{patient}', [PatientController::class, 'show'])->name('patients.show');
    Route::get('/pasien/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('/pasien/{patient}', [PatientController::class, 'update'])->name('patients.update');
    Route::patch('/pasien/{patient}/status', [PatientController::class, 'updateStatus'])->name('patients.status');
    Route::delete('/pasien/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Laporan Pelayanan
    Route::get('/laporan', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/laporan/export', [ReportController::class, 'exportExcel'])->name('reports.export');

    // Manajemen QR Code
    Route::get('/qrcode', [QrCodeController::class, 'index'])->name('qrcode.index');
    Route::get('/qrcode/download', [QrCodeController::class, 'download'])->name('qrcode.download');
    Route::get('/qrcode/poster', [QrCodeController::class, 'printPoster'])->name('qrcode.poster');

    // Manajemen Layanan KB
    Route::get('/layanan', [KbServiceManagementController::class, 'index'])->name('services.index');
    Route::get('/layanan/{service}/edit', [KbServiceManagementController::class, 'edit'])->name('services.edit');
    Route::put('/layanan/{service}', [KbServiceManagementController::class, 'update'])->name('services.update');
    Route::patch('/layanan/{service}/toggle', [KbServiceManagementController::class, 'toggleStatus'])->name('services.toggle');
});
