<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KbService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KbServiceManagementController extends Controller
{
    /**
     * Display a listing of KB contraceptive services.
     */
    public function index(): View
    {
        $services = KbService::withCount('patientRegistrations')
            ->orderBy('sort_order')
            ->get();

        return view('admin.services.index', [
            'services' => $services,
        ]);
    }

    /**
     * Show the form for editing the specified KB service.
     */
    public function edit(KbService $service): View
    {
        return view('admin.services.edit', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified KB service.
     */
    public function update(Request $request, KbService $service): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'full_description' => ['nullable', 'string'],
            'effectiveness' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:255'],
            'procedure_instructions' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('status', "Layanan KB {$service->name} berhasil diperbarui.");
    }

    /**
     * Toggle the active status of a KB service.
     */
    public function toggleStatus(KbService $service): RedirectResponse
    {
        $service->update([
            'is_active' => ! $service->is_active,
        ]);

        $statusText = $service->is_active ? 'diaktifkan' : 'dinonaktifkan';

        return back()->with('status', "Layanan {$service->name} berhasil {$statusText}.");
    }
}
