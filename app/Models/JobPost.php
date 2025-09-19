<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobPost extends Model
{
    protected $table = 'jobs';

    protected $casts = [
        'posted_at' => 'datetime',
        'expiry_at'=>'datetime'
    ];

    // Relationship to JobApplication
    public function applications()
    {
        return $this->hasMany(JobApplication::class, 'job_id');
    }
}
