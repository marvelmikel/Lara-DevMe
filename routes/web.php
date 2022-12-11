<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [UserController::class, 'index'])->name('dashboard');
    Route::get('/feed/{id}', [UserController::class, 'feed'])->name('feed');
    Route::post('/subscribe', [UserController::class, 'subscribe'])->name('subscribe');
    Route::post('/unsubscribe', [UserController::class, 'unsubscribe'])->name('unsubscribe');

});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register-user', [RegisterController::class, 'store'])->name('register.user');
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login-user', [LoginController::class, 'loginUser'])->name('login.user');
    Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
});
