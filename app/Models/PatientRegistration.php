<?php

namespace App\Models;

use Database\Factories\PatientRegistrationFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientRegistration extends Model
{
    /** @use HasFactory<PatientRegistrationFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'registration_number',
        'kb_service_id',
        'patient_name',
        'husband_name',
        'nik',
        'birth_date',
        'phone_number',
        'address',
        'service_date',
        'kb_history',
        'status',
        'notes',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'birth_date' => 'date',
        'service_date' => 'date',
    ];

    /**
     * Get the KB service selected for this registration.
     */
    public function kbService(): BelongsTo
    {
        return $this->belongsTo(KbService::class, 'kb_service_id');
    }

    /**
     * Generate an formatted registration number: KB-YYYYMMDD-XXXX
     */
    public static function generateRegistrationNumber(): string
    {
        $prefix = 'KB-'.now()->format('Ymd').'-';
        $latest = static::where('registration_number', 'LIKE', $prefix.'%')
            ->orderByDesc('id')
            ->value('registration_number');

        if ($latest) {
            $lastSequence = (int) substr($latest, strlen($prefix));
            $sequence = str_pad((string) ($lastSequence + 1), 4, '0', STR_PAD_LEFT);
        } else {
            $sequence = '0001';
        }

        return $prefix.$sequence;
    }

    /**
     * Scope query to search by name or NIK.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        if (blank($term)) {
            return $query;
        }

        return $query->where(function (Builder $subQuery) use ($term) {
            $subQuery->where('patient_name', 'like', "%{$term}%")
                ->orWhere('husband_name', 'like', "%{$term}%")
                ->orWhere('nik', 'like', "%{$term}%")
                ->orWhere('registration_number', 'like', "%{$term}%");
        });
    }

    /**
     * Scope query for a specific period (month and year).
     */
    public function scopeForPeriod(Builder $query, ?int $month = null, ?int $year = null): Builder
    {
        if ($month) {
            $query->whereMonth('service_date', $month);
        }

        if ($year) {
            $query->whereYear('service_date', $year);
        }

        return $query;
    }
}
