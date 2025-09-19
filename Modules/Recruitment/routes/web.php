<?php

use Illuminate\Support\Facades\Route;
use Modules\Recruitment\Http\Controllers\JobApplicationController;
use Modules\Recruitment\Http\Controllers\JobController;
use Modules\Recruitment\Http\Controllers\JobOfferController;
use Modules\Recruitment\Http\Controllers\RecruitmentController;

Route::group(['prefix'=>'admin/recruitment','as'=>'recruitment.','middleware'=>'auth'], function () {
    Route::resource('jobs', JobController::class)->names('jobs');
    Route::resource('job-applications', JobApplicationController::class)->names('jobs-applications');
    Route::resource('job-offers', JobOfferController::class)->names('jobs-offers');
});
