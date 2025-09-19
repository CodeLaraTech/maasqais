<?php

namespace Modules\LMS\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Modules\Global\Models\ReferenceSchema;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasTranslations;

    protected $table = 'students';

    protected $translatable = ['name', 'bio'];

    protected $fillable = [
        'name',
        'bio',
        'email',
        'phone',
        'photo',
        'reference',
        'user_id'
    ];

    protected $casts = [
        'name' => 'array',
        'bio' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->reference = ReferenceSchema::generate('student');
        });
    }

    /**
     * Translate input text into English, Urdu, Arabic JSON.
     */
    private static function autoTranslate($text)
    {
        if (empty($text))
            return ['en' => '', 'ur' => '', 'ar' => ''];

        try {
            return [
                'en' => $text,
                'ur' => self::translate($text, 'ur'),
                'ar' => self::translate($text, 'ar'),
            ];
        } catch (\Exception $e) {
            return ['en' => $text, 'ur' => $text, 'ar' => $text];
        }
    }

    private static function translate($text, $target)
    {
        if (empty($text))
            return $text;

        $response = Http::post('https://libretranslate.de/translate', [
            'q' => $text,
            'source' => 'en',
            'target' => $target,
            'format' => 'text',
        ]);

        return $response->successful() ? ($response->json()['translatedText'] ?? $text) : $text;
    }

    private static function sendSIDEmail($student)
    {
        Mail::raw("Welcome {$student->name['en']}! Your Student ID is: {$student->reference}", function ($msg) use ($student) {
            $msg->to($student->email)->subject('Your Student ID');
        });
    }

    /**
     * Many-to-many relationship: student can have multiple courses
     */
    public function courses()
    {
        return $this->belongsToMany(
            Course::class,
            'courses_students', // same pivot table
            'student_id',       // pivot column that points to this model
            'course_id'         // pivot column that points to related model
        )->withTimestamps();
    }

    public function getCourseNamesAttribute()
    {
        return $this->courses->map(fn($c) => method_exists($c, 'getTranslation')
            ? $c->getTranslation('name', 'en')
            : (is_array($c->name) ? ($c->name['en'] ?? reset($c->name)) : $c->name)
        )->join(', ');
    }
}
