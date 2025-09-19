<?php

use Illuminate\Support\Facades\Route;
use Modules\LMS\Http\Controllers\CourseController;
use Modules\LMS\Http\Controllers\InstructorController;
use Modules\LMS\Http\Controllers\StudentController;
use Modules\LMS\Livewire\Students\Index as StudentsIndex;
use Modules\LMS\Livewire\Students\AdminCreate;
use Modules\LMS\Livewire\Instructors\Create as InstructorCreate;

Route::group([
    'prefix' => 'admin/lms',
    'as' => 'lms.',
    'middleware' => ['auth', 'verified'],
], function () {

    // Courses
    Route::resource('courses', CourseController::class)->names('courses');

    // Instructors
    Route::resource('instructors', InstructorController::class)->names('instructors');
    Route::get('instructors/create', InstructorCreate::class)->name('instructors.create');

    // Students
    Route::resource('students', StudentController::class)->names('students');
    Route::get('students/live', StudentsIndex::class)->name('students.live');
    Route::post('courses/{course}/assign-students', [CourseController::class, 'assignStudents'])
        ->name('courses.assign-students');
    Route::post('students/{student}/assign-courses', [StudentController::class, 'assignCourses'])
        ->name('students.assign-courses');
    

});
