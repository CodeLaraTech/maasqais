<?php

namespace Modules\Business\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Business\Database\Factories\BusinessPartnerFactory;
use Modules\Assets\Models\Asset;
class BusinessPartner extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'email'];

    protected static function newFactory(): BusinessPartnerFactory
    {
        //return BusinessPartnerFactory::new();
    }

    public function assets()
    {
        return $this->belongsToMany(Asset::class, 'asset_business_partners')->withPivot('percentage');
    }
}
