<?php

namespace Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CRM\Database\Factories\LeadFactory;

class Lead extends Model
{
    use HasFactory;
   // use HasTranslations;


    const STATUS_SELECT = [
        'pending'=>'Pending',
    ];
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'followup_date',
        'source_id',
        'phone',
        'status',
    ];




    public static function boot()
    {
        parent::boot();

        static::creating(function ($lead) {
            $lead->reference = generateSerialNumber('lead');
        });
    }

    public function source(){
         return $this->belongsTo(CrmSource::class, 'source_id');
    }

    protected static function newFactory(): LeadFactory
    {
        //return LeadFactory::new();
    }
}
