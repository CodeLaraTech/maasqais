<?php

use Illuminate\Support\Facades\Route;
use Modules\System\Http\Controllers\MenuController;
use Modules\System\Http\Controllers\MenuItemController;

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

Route::group(['prefix'=>'admin/system','as'=>'system.','middleware'=>'auth'], function () {
    Route::resource('menus', MenuController::class)->names('menus');
    Route::resource('menu-items', MenuItemController::class)->names('menu-items');
});
