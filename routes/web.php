<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JadwalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class);

Route::resource('jurusan', JurusanController::class);

Route::resource('guru', GuruController::class);

Route::resource('mata-pelajaran', MapelController::class);

Route::resource('kelas', KelasController::class)->parameters([
    'kelas' => 'kelas' // Memaksa agar parameternya tetap {kelas}, bukan {kela}
]);

Route::resource('jadwal-pelajaran', JadwalController::class);
