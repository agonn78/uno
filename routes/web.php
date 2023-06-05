<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['cors'])->group(function() {

    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::get('/user/auth', function() {
        return redirect('/');
    });
    Route::post('/user/auth', [AuthController::class, 'login'])->name('auth');
    Route::post('/user/signup', [AuthController::class, 'register'])->name('register');
    Route::get('/user/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/profile/{username}', [\App\Http\Controllers\ProfileController::class, 'index'])
        ->middleware('auth')->name('profile');


    Route::get('/game/{uuid}', [\App\Http\Controllers\UnoController::class, 'index'])
        ->middleware('auth')->name('game');
});
