<?php

use App\Http\Controllers\CMS\AdminController;
use App\Http\Controllers\CMS\DosenController;
use App\Http\Controllers\CMS\JudulController;
use App\Http\Controllers\CMS\JurnalController;
use App\Http\Controllers\CMS\MahasiswaController;
use App\Http\Controllers\CMS\PengajuanController;
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
    Route::get('/{id}', [JudulController::class, 'getById']);
    Route::patch('/{id}', [JudulController::class, 'updateData']);
    Route::delete('/{id}', [JudulController::class, 'deleteData']);
});

Route::prefix('jurnal')->group(function () {
    Route::post('/', [JurnalController::class, 'createData']);
    Route::get('/{id}', [JurnalController::class, 'getById']);
    Route::patch('/{id}', [JurnalController::class, 'updateData']);
    Route::delete('/{id}', [JurnalController::class, 'deleteData']);
});

Route::prefix('pengajuan')->group(function () {
    Route::post('/', [PengajuanController::class, 'createData']);
    Route::get('/{id}', [PengajuanController::class, 'getById']);
    Route::delete('/{id}', [PengajuanController::class, 'deleteData']);
});
