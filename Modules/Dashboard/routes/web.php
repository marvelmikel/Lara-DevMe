<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

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

Route::group([], function () {
   
    Route::get('/dashboard', function () {
        return view('dashboard::index');
    })->middleware(['auth', 'verified'])->name('dashboard');
    

    Route::resource('dashboard', DashboardController::class)->names('dashboard');
});
