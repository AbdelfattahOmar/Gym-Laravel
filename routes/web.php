<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\GymManagerController;
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
Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('auth');

// user routes
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->middleware('auth');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth');

// city routes
Route::get('/city', [CityController::class, 'index'])->name('city.index')->middleware('auth');
Route::get('/city/create', [CityController::class, 'create'])->name('city.create')->middleware('auth');
Route::post('/city', [CityController::class, 'store'])->name('city.store')->middleware('auth');
Route::get('/city/{cityID}', [CityController::class, 'show'])->name('city.show')->middleware('auth');
Route::get('/city/{cityID}/edit', [CityController::class, 'edit'])->name('city.edit')->middleware('auth');
Route::put('/city/{cityID}', [CityController::class, 'update'])->name('city.update')->middleware('auth');
Route::delete('/city/{cityID}', [CityController::class, 'destroy'])->name('city.destroy')->middleware('auth');
Route::get('/restoredCities', [CityController::class, 'showDeleted'])->name('city.showDeleted')->middleware('auth')->middleware('role:admin');
Route::get('/restoredCities/{postID}', [CityController::class, 'restore'])->name('city.restored')->middleware('auth')->middleware('role:admin');



//gym routes
Route::controller(GymController::class)->group(function () {
    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::delete('/gym/{id}', 'deleteGym')->name('gym.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/show/{id}', 'show')->name('gym.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
});

Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
})->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');


//city manager routes
Route::controller(CityManagerController::class)->group(function () {
    Route::get('/cityManager/create', 'create')->name('cityManager.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::post('/cityManager/store', 'store')->name('cityManager.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/list', 'list')->name('cityManager.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/edit/{id}', 'edit')->name('cityManager.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::put('/cityManager/update/{id}', 'update')->name('cityManager.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::delete('/cityManager/{id}', 'deletecityManager')->name('cityManager.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
    Route::get('/cityManager/show/{id}', 'show')->name('cityManager.show')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
});

// gym manager routes
Route::get('/gymManager/index', [GymManagerController::class, 'index'])->name('gymManager.index')->middleware('auth');
Route::get('/gymManager/create', [GymManagerController::class, 'create'])->name('gymManager.create')->middleware('auth');
Route::post('/gymManager/store', [GymManagerController::class, 'store'])->name('gymManager.store')->middleware('auth');
Route::get('/gymManager/show/{id}', [GymManagerController::class, 'show'])->name('gymManager.show')->middleware('auth');
Route::get('/gymManager/{id}/edit', [GymManagerController::class, 'edit'])->name('gymManager.edit')->middleware('auth');
Route::put('/gymManager/{id}', [GymManagerController::class, 'update'])->name('gymManager.update');
Route::delete('/gymManager/{id}', [GymManagerController::class, 'delete'])->name('gymManager.delete')->middleware('auth');


Route::get('/TrainingSessions/index', [TrainingSessionController::class, 'index'])->name('trainingSession.listSessions')->middleware('auth');
Route::get('/TrainingSessions/create_session', [TrainingSessionController::class, 'create'])->name('trainingSession.training_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::post('/TrainingSessions/sessions', [TrainingSessionController::class, 'store'])->name('trainingSession.store')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/sessions/{session}', [TrainingSessionController::class, 'show'])->name('trainingSession.show_training_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::delete('/TrainingSessions/{session}', [TrainingSessionController::class, 'deleteSession'])->name('trainingSession.deleteSession')->middleware('auth')->middleware('role:admin|cityManager|gymManager');



///  coach routes
Route::get('/coach/index', [CoachController::class, 'index'])->name('coaches.index')->middleware('auth');

Auth::routes();
Route::get('/register', [ErrorController::class, 'unAuth'])->name('500');
