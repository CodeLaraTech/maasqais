<?php

use Illuminate\Support\Facades\Route;
use Modules\CRM\Http\Controllers\CRMController;
use Modules\CRM\Http\Controllers\LeadController;
use Modules\CRM\Http\Controllers\OpportunityController;
use Modules\CRM\Http\Controllers\CustomerController;

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

Route::group(['prefix'=>'admin/crm','as'=>'crm.','middleware'=>'auth'], function () {
    Route::resource('leads', LeadController::class)->names('leads');
    Route::resource('opportunities', OpportunityController::class)->names('opportunities');
    Route::resource('customers', CustomerController::class)->names('customers');
});
