<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SiswaController;
use App\Http\Controllers\SiswaController as ControllersSiswaController;

Route::middleware(['auth:sanctum'])
    ->name('api.')
    ->group(function () {
    //user
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    //jurusan
    Route::apiResource('/jurusan', JurusanController::class);

    //guru
    Route::apiResource('/guru', GuruController::class);

    //mapel
    Route::apiResource('/mata-pelajaran', MapelController::class);

    // kelas
    Route::apiResource('/kelas', KelasController::class);

    // jadwal
    Route::apiResource('/jadwal-pelajaran', JadwalPelajaranController::class);


    // siswa
    Route::apiResource('/siswa', SiswaController::class);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
