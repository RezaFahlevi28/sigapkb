<?php

namespace App\Models;

use Database\Factories\KbServiceFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KbService extends Model
{
    /** @use HasFactory<KbServiceFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'category',
        'short_description',
        'full_description',
        'effectiveness',
        'duration',
        'procedure_instructions',
        'advantages',
        'side_effects',
        'icon',
        'is_active',
        'sort_order',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'advantages' => 'array',
        'side_effects' => 'array',
    ];

    /**
     * Get patient registrations associated with this KB service.
     */
    public function patientRegistrations(): HasMany
    {
        return $this->hasMany(PatientRegistration::class);
    }

    /**
     * Scope a query to only include active KB services.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
