<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JoblistController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/services/interior-design', function () {
    return view('services-interior-design');
});

Route::get('/services/fitout-works', function () {
    return view('services-fitout-works');
});

Route::get('/services/joinery-specialist', function () {
    return view('services-joinery-specialist');
});

Route::get('/services/furniture-supply', function () {
    return view('services-furniture-supply');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/careers', function () {
    return view('careers');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::post('/contact-us', [ContactController::class, 'sendContact'])->name('contact.send');

// Route for listing all jobs
Route::get('/careers', [JobController::class, 'index'])->name('careers.index');
Route::get('/job/{id}', [JobController::class, 'show'])->name('job.show');
Route::get('/job_details', [JobController::class, 'showJob']);



// Route for displaying individual job details
Route::get('/careers/{id}', [JobController::class, 'show'])->name('careers.show');
Route::post('/upload-cv', [EmailController::class, 'uploadCv'])->name('upload.cv');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
