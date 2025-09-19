<?php

namespace Modules\Global\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = [
        'module',
        'name',
        'type',
        'options',
        'is_required'
    ];

    /* sample data
    [
        'assets',
        'plate_number',
        'text',
        'NULL',
        0
    ];
    */
}
