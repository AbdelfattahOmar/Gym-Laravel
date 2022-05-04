<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('auth');

// user routes
Route::get('/users', [UserController::class, 'index'])->name('users.list')->middleware('auth');
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->middleware('auth');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth');

// city routes
Route::get('/city', [CityController::class, 'index'])->name('city.list')->middleware('auth');
Route::get('/city/create', [CityController::class, 'create'])->name('city.create')->middleware('auth');
Route::post('/city', [CityController::class, 'store'])->name('city.store')->middleware('auth');
Route::get('/city/{cityID}', [CityController::class, 'show'])->name('city.show')->middleware('auth');
Route::get('/city/{cityID}/edit', [CityController::class, 'edit'])->name('city.edit')->middleware('auth');
Route::put('/city/{cityID}', [CityController::class, 'update'])->name('city.update')->middleware('auth');
Route::delete('/city/{cityID}', [CityController::class, 'destroy'])->name('city.destroy')->middleware('auth');
Route::get('/restoredCities', [CityController::class, 'showDeleted'])->name('city.showDeleted')->middleware('auth')->middleware('role:admin');
Route::get('/restoredCities/{postID}', [CityController::class, 'restore'])->name('city.restored')->middleware('auth')->middleware('role:admin');

// city manager routes



Auth::routes();
Route::get('/register', [ErrorController::class, 'unAuth'])->name('500');