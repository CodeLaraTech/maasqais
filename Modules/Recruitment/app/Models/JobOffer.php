<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobOffer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'job_id',
        'job_application_id',
        'employer_name',
        'candidate_name',
        'basic_salary',
        'transport_allowance',
        'house_rent',
        'other_allowance',
        'gross_salary',
        'currency',
        'accommodation_available',
        'status',
        'offer_date',
        'expiry_date',
    ];

    protected $casts = [
        'offer_date' => 'date',
        'expiry_date' => 'date',
        'accommodation_available' => 'boolean',
        'basic_salary' => 'float',
        'transport_allowance' => 'float',
        'house_rent' => 'float',
        'other_allowance' => 'float',
        'gross_salary' => 'float',
    ];



    // Relationship: Offer belongs to Job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    // Relationship: Offer belongs to JobApplication
    public function application()
    {
        return $this->belongsTo(JobApplication::class, 'job_application_id');
    }

    // Accessor: Convenience for currency in uppercase
    public function getCurrencyAttribute($value)
    {
        return strtoupper($value);
    }
}
