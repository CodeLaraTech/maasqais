<?php

namespace Modules\Business\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Business\Database\Factories\SponsorFactory;

class Sponsor extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name', 'email'];

    protected static function newFactory(): SponsorFactory
    {
        //return SponsorFactory::new();
    }
}
