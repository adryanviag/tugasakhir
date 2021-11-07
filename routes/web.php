<?php

// ? Controllers
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IsiDisposisiController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\TerimaDisposisiController;
use App\Http\Controllers\StatusDisposisiController;

// ? Facades
use Illuminate\Support\Facades\Route;

// * Routes Start * //

// ! Dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth');

// ! Master Routes
Route::resource('klasifikasi', ClassificationController::class)
    ->middleware('admin');
Route::resource('lokasi', LocationController::class)
    ->middleware('admin');
Route::resource('instansi', InstanceController::class)
    ->middleware('admin');
Route::resource('unitkerja', UnitController::class)
    ->middleware('admin');
Route::resource('user', UserController::class)
    ->middleware('admin');
Route::resource('isidisposisi', IsiDisposisiController::class)
    ->middleware('admin');

// ! Proses Routes
Route::resource('suratmasuk', SuratMasukController::class)
    ->middleware('admin');
Route::resource('terimadisposisi', TerimaDisposisiController::class)
    ->middleware('auth');
Route::resource('statusdisposisi', StatusDisposisiController::class)
    ->middleware('auth');

// ! Change Pass
Route::get('/ganti-pass/{id}', [UserController::class, 'viewgantipass'])
    ->middleware('auth');
Route::put('/ganti-pass/{id}', [UserController::class, 'gantipass'])
    ->middleware('auth');

// ! login & logout
Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
