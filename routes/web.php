<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TrainingSessionController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\GymManagerController;
use App\Http\Controllers\TrainingPackagesController;
use App\Http\Controllers\AttendanceController;
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
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth')->middleware('role:admin|cityManager|gymManager');

// city routes
Route::get('/city', [CityController::class, 'index'])->name('city.index')->middleware('auth')->middleware('role:admin');
Route::get('/city/create', [CityController::class, 'create'])->name('city.create')->middleware('auth')->middleware('role:admin');
Route::post('/city', [CityController::class, 'store'])->name('city.store')->middleware('auth')->middleware('role:admin');
Route::get('/city/{cityID}', [CityController::class, 'show'])->name('city.show')->middleware('auth')->middleware('role:admin');
Route::get('/city/{cityID}/edit', [CityController::class, 'edit'])->name('city.edit')->middleware('auth')->middleware('role:admin');
Route::put('/city/{cityID}', [CityController::class, 'update'])->name('city.update')->middleware('auth')->middleware('role:admin');
Route::delete('/city/{cityID}', [CityController::class, 'destroy'])->name('city.destroy')->middleware('auth')->middleware('role:admin');
Route::get('/restoredCities', [CityController::class, 'showDeleted'])->name('city.showDeleted')->middleware('auth')->middleware('role:admin');
Route::get('/restoredCities/{postID}', [CityController::class, 'restore'])->name('city.restored')->middleware('auth')->middleware('role:admin');



//gym routes
Route::controller(GymController::class)->group(function () {
    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager');
    Route::delete('/gym/{id}', 'deleteGym')->name('gym.delete')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager'); 
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
Route::get('/gymManager/index', [GymManagerController::class, 'index'])->name('gymManager.index')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/gymManager/create', [GymManagerController::class, 'create'])->name('gymManager.create')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::post('/gymManager/store', [GymManagerController::class, 'store'])->name('gymManager.store')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/gymManager/show/{id}', [GymManagerController::class, 'show'])->name('gymManager.show')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/gymManager/{id}/edit', [GymManagerController::class, 'edit'])->name('gymManager.edit')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::put('/gymManager/{id}', [GymManagerController::class, 'update'])->name('gymManager.update')->middleware('role:admin|cityManager|gymManager');
Route::delete('/gymManager/{id}', [GymManagerController::class, 'delete'])->name('gymManager.delete')->middleware('auth')->middleware('role:admin|cityManager|gymManager');


///   Training session routes 
Route::get('/TrainingSessions/index', [TrainingSessionController::class, 'index'])->name('trainingSession.listSessions')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/create_session', [TrainingSessionController::class, 'create'])->name('trainingSession.training_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::post('/TrainingSessions/sessions', [TrainingSessionController::class, 'store'])->name('trainingSession.store')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/sessions/{session}', [TrainingSessionController::class, 'show'])->name('trainingSession.show_training_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::delete('/TrainingSessions/{session}', [TrainingSessionController::class, 'deleteSession'])->name('trainingSession.deleteSession')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::get('/TrainingSessions/{session}/edit', [TrainingSessionController::class, 'edit'])->name('trainingSession.edit_training_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');
Route::put('/TrainingSessions/{session}', [TrainingSessionController::class, 'update'])->name('trainingSession.update_session')->middleware('auth')->middleware('role:admin|cityManager|gymManager');




///  coach routes
Route::get('/coach/index', [CoachController::class, 'index'])->name('coaches.index')->middleware('auth')->middleware('role:admin|cityManager|gymManager');;
Route::get('/coach/create', [CoachController::class, 'create'])->name('coaches.create')->middleware('auth')->middleware('role:admin|cityManager|gymManager');;
Route::post('/coach/store', [CoachController::class, 'store'])->name('coaches.store')->middleware('auth')->middleware('role:admin|cityManager|gymManager');;
Route::get('/coach/show/{id}',[CoachController::class, 'show'])->name('coaches.show')->middleware('auth')->middleware('role:admin|cityManager|gymManager');;
Route::get('/coach/edit/{id}', [CoachController::class, 'edit'])->name('coaches.edit')->middleware('auth')->middleware('role:admin|cityManager|gymManager');;
Route::put('/coach/{id}', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('/coach/{id}', [CoachController::class, 'delete'])->name('coaches.delete')->middleware('auth');

// attendance routes
Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance')->middleware('auth')->middleware('role:admin|cityManager|gymManager');


Auth::routes();
Route::get('/register', [ErrorController::class, 'unAuth'])->name('500');


// Packages Routes

Route::get('/trainingPackages/create_package', [TrainingPackagesController::class, 'create'])->name('trainingPackeges.creatPackege')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::post('/trainingPackages/package', [TrainingPackagesController::class, 'store'])->name('trainingPackeges.store')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::get('/trainingPackages/index', [TrainingPackagesController::class, 'index'])->name('trainingPackeges.listPackeges')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin|cityManager|gymManager');
Route::get('/trainingPackages/package/{session}', [TrainingPackagesController::class, 'show'])->name('trainingPackeges.show_training_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::delete('/trainingPackages/{package}  ', [TrainingPackagesController::class, 'destroy'])->name('trainingPackeges.delete_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::get('/trainingPackages/{package}/edit', [TrainingPackagesController::class, 'edit'])->name('trainingPackeges.editPackege')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');
Route::put('/trainingPackages/{package}', [TrainingPackagesController::class, 'update'])->name('trainingPackeges.update_package')->middleware('auth')->middleware('logs-out-banned-user')->middleware('role:admin');