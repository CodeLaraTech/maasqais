<?php

namespace Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CRM\Database\Factories\OpportunityFactory;

class Opportunity extends Model
{
    use HasFactory;

    const STATUS_SELECT = [
        'pending'=>'Pending',
    ];


    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'reference',
        'opp_from',
        'lead_id',
        'customer_id',
        'title',
        'description',
        'value',
        'status',
        'expected_close_date',
        'followup_date',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($opportunity) {
            $opportunity->reference = generateSerialNumber('opportunity');
        });
    }

    public function lead(){
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
