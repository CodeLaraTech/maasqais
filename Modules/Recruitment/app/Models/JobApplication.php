<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class JobApplication extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    /**
     * The attributes that are mass assignable.
     */
     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'resume',
        'job_id', // ✅ include this to allow saving the relation
    ];

    public const STATUS_SELECT = ['applied', 'shortlisted', 'interviewed', 'offered', 'rejected'];

    public function Job(){
        return $this->belongsTo(Job::class);
    }

    public function getResumeUrlAttribute()
    {
        return $this->getFirstMediaUrl('resumes');
    }

    public function offer(){
        return $this->hasOne(JobOffer::class);
    }
}
