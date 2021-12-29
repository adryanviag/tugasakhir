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

// Dashboard
Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth');

// Only Admin can access these routes.
Route::group(['middleware' => 'admin'], function () {
    // ! Master Routes
    Route::resource('klasifikasi', ClassificationController::class);
    Route::resource('lokasi', LocationController::class);
    Route::resource('instansi', InstanceController::class);
    Route::resource('unitkerja', UnitController::class);
    Route::resource('user', UserController::class);
    Route::resource('isidisposisi', IsiDisposisiController::class);

    // ! Process Route.
    Route::resource('suratmasuk', SuratMasukController::class);
    Route::get('/suratmasuk/{nosurat}/disposisi', [SuratMasukController::class, 'disposisi']);
    Route::get('/export/suratmasuk', [SuratMasukController::class, 'export']);
    Route::post('/suratmasuk/disposisi', [SuratMasukController::class, 'tambahdisposisi']);
});

// Public Routes.
Route::group(['middleware' => 'auth'], function () {
    // ! Status.
    Route::resource('statusdisposisi', StatusDisposisiController::class);
    Route::get('/status/{nosurat}/disposisi', [StatusDisposisiController::class, 'status']);
    Route::get('/export/status', [StatusDisposisiController::class, 'export']);

    // ! Terima.
    Route::resource('terimadisposisi', TerimaDisposisiController::class);
    Route::get('/terimadisposisi/{nosurat}/disposisi', [TerimaDisposisiController::class, 'disposisi']);
    Route::post('/terimadisposisi/disposisi', [TerimaDisposisiController::class, 'tambahdisposisi']);

    // ! Change Pass
    Route::get('/ganti-pass/{id}', [UserController::class, 'viewgantipass']);
    Route::put('/ganti-pass/{id}', [UserController::class, 'gantipass']);
});


// ! login & logout
Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
