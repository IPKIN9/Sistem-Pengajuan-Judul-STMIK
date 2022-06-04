<?php

use App\Http\Controllers\CMS\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('mahasiswa')->group(function () {
    Route::post('/', [MahasiswaController::class, 'createMahasiswa']);
    Route::get('/{id}', [MahasiswaController::class, 'getById']);
    Route::patch('/{id}', [MahasiswaController::class, 'updateMahasiswa']);
    Route::delete('/{id}', [MahasiswaController::class, 'deleteMahasiswa']);
});
