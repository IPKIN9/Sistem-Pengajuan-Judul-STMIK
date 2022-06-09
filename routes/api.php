<?php

use App\Http\Controllers\CMS\AdminController;
use App\Http\Controllers\CMS\DosenController;
use App\Http\Controllers\CMS\JudulController;
use App\Http\Controllers\CMS\MahasiswaController;
use App\Http\Controllers\CMS\SIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('mahasiswa')->group(function () {
    Route::post('/', [MahasiswaController::class, 'createMahasiswa']);
    Route::get('/{id}', [MahasiswaController::class, 'getById']);
    Route::patch('/{id}', [MahasiswaController::class, 'updateMahasiswa']);
    Route::delete('/{id}', [MahasiswaController::class, 'deleteMahasiswa']);
});

Route::prefix('dosen')->group(function () {
    Route::post('/', [DosenController::class, 'createInDosen']);
    Route::get('/{id}', [DosenController::class, 'getById']);
    Route::patch('/{id}', [DosenController::class, 'updateById']);
    Route::delete('/{id}', [DosenController::class, 'deleteById']);
});

Route::prefix('sistem_informasi')->group(function () {
    Route::post('/', [SIController::class, 'createData']);
    Route::get('/{id}', [SIController::class, 'getById']);
    Route::patch('/{id}', [SIController::class, 'updateInSI']);
    Route::delete('/{id}', [SIController::class, 'deleteData']);
});

Route::prefix('admin')->group(function () {
    Route::post('/', [AdminController::class, 'createData']);
    Route::get('/{id}', [AdminController::class, 'getById']);
    Route::patch('/{id}', [AdminController::class, 'updateData']);
    Route::delete('/{id}', [AdminController::class, 'deleteData']);
});

Route::prefix('judul')->group(function () {
    Route::post('/', [JudulController::class, 'createData']);
});
