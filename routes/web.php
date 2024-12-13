<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\UserController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); 
})->name('logout');
