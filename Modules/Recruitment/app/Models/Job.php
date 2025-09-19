<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CRM\Models\Customer;

// use Modules\Recruitment\Database\Factories\JobFactory;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    public const JOB_TYPES = [
        'full-time'  => 'Full-time',
        'part-time'  => 'Part-time',
        'contract'   => 'Contract',
        'internship' => 'Internship',
        'temporary'  => 'Temporary',
        'freelance'  => 'Freelance',
    ];

    protected $fillable = [
        'customer_id',
        'employer_name',
        'location',
        'type',
        'title',
        'slug',
        'description',
        'image',
        'posted_at',
        'expiry_at',
        'basic_salary',
        'transportation',
        'accommodation',
        'house_rent',
        'other_allowances',
        'gross_salary',
    ];

    protected $casts = [
        'posted_at' => 'datetime',
        'expiry_at' => 'datetime',
        'basic_salary' => 'float',
        'transportation_allowance' => 'float',
        'accommodation_provided' => 'boolean',
        'house_rent_allowance' => 'float',
        'other_allowances' => 'float',
        'gross_salary' => 'float',
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function applications(){
        return $this->hasMany(JobApplication::class);
    }
}
