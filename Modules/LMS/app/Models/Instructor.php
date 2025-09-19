<?php

namespace Modules\LMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Modules\LMS\Models\Course;

class Instructor extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
        'bio'
    ];

    protected $fillable = [
        'name',
        'email',
        'photo',
        'bio'
    ];

    public function courses()
    {
        // Explicitly define pivot table and disable timestamps
        return $this->belongsToMany(
            Course::class,          // Related model
            'course_instructor',    // Pivot table name
            'instructor_id',        // Foreign key on pivot table for this model
            'course_id'             // Foreign key on pivot table for related model
        )->withPivot([])           // No extra columns
         ->withTimestamps(false);  // Disable pivot timestamps
    }
}
