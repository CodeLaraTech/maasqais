<?php

namespace Modules\CRM\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CRM\Database\Factories\CrmSourceFactory;
use Spatie\Translatable\HasTranslations;

class CrmSource extends Model
{
    use HasFactory;
   // use HasTranslations;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];
  //  public $translatable = ['name'];

    protected static function newFactory(): CrmSourceFactory
    {
        //return CrmSourceFactory::new();
    }
}
