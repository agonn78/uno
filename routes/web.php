<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/user/auth', [AuthController::class, 'login'])->name('auth');
Route::post('/user/signup', [AuthController::class, 'register'])->name('register');
Route::get('/user/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/profile/{username}', function ($username) {
    if (Auth::user()->username !== $username) {
        return redirect('/profile/'.Auth::user()->username);
    }
    return view('profile', ['username' => $username, 'user' => Auth::user()]);
})->middleware('auth')->name('profile');

Route::get('/game/uno/create', function() {
    return view('game.uno');
})->middleware('auth')->name('game.uno');
