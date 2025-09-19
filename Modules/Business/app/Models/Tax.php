<?php

namespace Modules\Business\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Business\Database\Factories\TaxFactory;

class Tax extends Model
{
    use HasFactory;

    /*Status*/

    const STATUS_SELECT = [
        'active'=>'Active',
        'inactive'=>'Inactive',
    ];

    /**
     * The attributes that are mass assignable.
    */

    protected $fillable = ['name', 'code', 'symbol_left', 'symbol_right' , 'rate'];

}
