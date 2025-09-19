<?php

namespace Modules\LMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations; // for multilingual support
use Modules\LMS\Models\Instructor;
use Modules\LMS\Models\Student;

class Course extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'courses';

    // Fields that are translatable (stored as JSON in DB)
    public $translatable = [
        'name',
        'description',
    ];

    protected $fillable = [
        'name',           // JSON with en, ar, ur
        'description',    // optional: can also be translatable if needed
        'slug',
        'status',
        'fee',
        'price_display',
        'duration_value',
        'duration_type',
        'image',
    ];

    // Relationship: course ↔ instructors
    public function instructors()
    {
        return $this->belongsToMany(
            Instructor::class,
            'course_instructor',
            'course_id',
            'instructor_id'
        );
    }

    // Relationship: course ↔ students
    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'courses_students',  // pivot table name
            'course_id',         // pivot column that points to this model
            'student_id'         // pivot column that points to related model
        )->withTimestamps();
    }
}
