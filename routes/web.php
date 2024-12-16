<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdministrativeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FoodTableController;

//WEB
Route::get('/home', [WebController::class, 'home'])->name('home');
//

//ADMINISTRATIVE
Route::get('/administrative', [AdministrativeController::class, 'administrative'])->name('administrative');
//

//USERS
Route::get('users/login', [UserController::class, 'showLoginForm'])->name('users.login');
Route::post('users/login', [UserController::class, 'login']);

Route::get('users/register', [UserController::class, 'showRegistrationForm'])->name('users.register.form');
Route::post('users/register', [UserController::class, 'register'])->name('users.register');

Route::post('users/logout', function () {
    Auth::logout();
    return redirect('/home'); 
})->name('logout');

Route::get('users/auto-view', [UserController::class, 'autoView'])->name('users.auto-view');
Route::get('users/auto-edit', [UserController::class, 'autoEdit'])->name('users.auto-edit');
Route::get('users/auto-edit-password', [UserController::class, 'autoEditPassword'])->name('users.auto-edit-password');

Route::middleware(['auth'])->group(function () {
    Route::post('users/update', [UserController::class, 'update'])->name('users.update');
});

Route::post('users/update-password', [UserController::class, 'updatePassword'])->name('users.update-password');

Route::get('users/customers-dashboard', [UserController::class, 'customersDashboard'])->name('users.customers-dashboard');


Route::get('users/collaborators-dashboard', [UserController::class, 'collaboratorsDashboard'])->name('users.collaborators-dashboard');
Route::get('users/collaborators-edit/{id}', [UserController::class, 'collaboratorsEdit'])->name('users.collaborators-edit');
Route::get('users/collaborators-view/{id}', [UserController::class, 'collaboratorsView'])->name('users.collaborators-view');
Route::put('users/{id}', [UserController::class, 'update'])->name('foodTables.update');
Route::get('users/collaborators-filter', [UserController::class, 'collaboratorsFilter'])->name('users.collaborators-filter');
Route::get('/users/collaborators-add', [UserController::class, 'collaboratorsAdd'])->name('users.collaborators-add');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


//

//RESERVATIONS
Route::get('reservations/dashboard', [ReservationController::class, 'dashboard'])->name('reservations.dashboard');
Route::get('reservations/edit/{id}', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::get('reservations/view/{id}', [ReservationController::class, 'view'])->name('reservations.view');
Route::put('reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::get('reservations/filter', [ReservationController::class, 'filter'])->name('reservations.filter');
Route::get('/reservations/add', [ReservationController::class, 'add'])->name('reservations.add');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
//

//FOOD TABLES
Route::get('foodTables/dashboard', [FoodTableController::class, 'dashboard'])->name('foodTables.dashboard');
Route::get('foodTables/edit/{id}', [FoodTableController::class, 'edit'])->name('foodTables.edit');
Route::get('foodTables/view/{id}', [FoodTableController::class, 'view'])->name('foodTables.view');
Route::put('foodTables/{id}', [FoodTableController::class, 'update'])->name('foodTables.update');
Route::get('foodTables/filter', [FoodTableController::class, 'filter'])->name('foodTables.filter');
Route::get('/foodTables/add', [FoodTableController::class, 'add'])->name('foodTables.add');
Route::post('/foodTables', [FoodTableController::class, 'store'])->name('foodTables.store');
//

