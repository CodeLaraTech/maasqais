<?php

use Illuminate\Support\Facades\Route;
use Modules\Global\Http\Controllers\GlobalController;
use Modules\Global\Http\Controllers\ReferenceSchemaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'admin/global','as'=>'global.'], function () {
    Route::resource('reference-schemas', ReferenceSchemaController::class)->names('reference-schemas');
});
