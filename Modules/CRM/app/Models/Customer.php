<?php

namespace Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CRM\Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Global\Models\Address;
use Modules\Global\Models\ReferenceSchema;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'company',
        'industry',
        'website',
        'trn',
    ];

    const STATUS_SELECT = [
        'active'=>'Active',
        'inactive'=>'Inactive',
    ];


    public static function boot()
    {
        parent::boot();

        static::creating(function ($customer) {
            $customer->reference = ReferenceSchema::generate('customer');
        });
    }

     // Assuming 'name' is the searchable column
     public static function getSearchableColumn()
     {
         return 'reference';
     }

    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function billingAddress()
    {
        return $this->addresses->where('address_type','billing_address')->first();
    }
}
