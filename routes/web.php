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

Route::get('/city', [CityController::class, 'index'])->name('city.index')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');


Auth::routes();
Route::get('/register', [ErrorController::class, 'unAuth'])->name('500');