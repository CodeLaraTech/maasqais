<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplyController;

use App\Models\JobPost;
use App\Http\Controllers\FrontendController;
use Nwidart\Modules\Facades\Module;

// Job routes
Route::get('/job/{slug}', [JobController::class, 'showBySlug'])->name('job.detail');

// Contact form


Route::post('/contact-send', [EmailController::class, 'sendContactForm'])->name('contact.send');


// CV upload
Route::post('/upload-cv', [EmailController::class, 'uploadCv'])->name('upload.cv');



// Authenticated dashboard
Route::get('admin/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';

foreach (\Module::all() as $module) {
    $webRoutes = module_path($module->getName()) . '/Routes/web.php';
    if (file_exists($webRoutes)) {
        require $webRoutes;
    }
}

Route::get('jobs',[JobController::class,'index']);

Route::get('job/{slug}', function ($slug) {
    $job = JobPost::where('slug', $slug)->firstOrFail();
    return view('job-details', compact('job'));
})->name('job.detail');

Route::post('jobs/{id}/apply-job', [JobController::class, 'apply'])->name('jobs.apply');


// Catch-all dynamic CMS route (keep last)
 Route::get('{slug}', [FrontendController::class, 'showPage'])
        ->where('slug', '.*')
        ->name('frontend.page');

