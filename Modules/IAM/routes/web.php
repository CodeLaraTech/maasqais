<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Modules\IAM\Http\Controllers\RoleController;
use Modules\IAM\Http\Controllers\PermissionController;
use Modules\IAM\Http\Controllers\PermissionGroupController;
use Modules\IAM\Http\Controllers\UserController;


Route::group(['prefix'=>'admin/iam','as'=>'iam.','middleware'=>'auth'], function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('permission-groups', PermissionGroupController::class);

     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
