<?php

use App\Http\Controllers\CMS\AdminController;
use App\Http\Controllers\CMS\DosenController;
use App\Http\Controllers\CMS\JudulController;
use App\Http\Controllers\CMS\JurnalController;
use App\Http\Controllers\CMS\MahasiswaController;
use App\Http\Controllers\CMS\PengajuanController;
use App\Http\Controllers\CMS\SIController;
use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('CMS.dashboard');
});

Route::get('/swagger-doc', function () {
    return view('Swagger.index');
});

Route::get('/mahasiswa_page', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/dosen_page', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/sistem_informasi_page', [SIController::class, 'index'])->name('si.index');
Route::get('/admin_page', [AdminController::class, 'index'])->name('admin.index');
Route::get('/judul_page', [JudulController::class, 'index'])->name('judul.index');
Route::get('/jurnal_page', [JurnalController::class, 'index'])->name('jurnal.index');
Route::get('/pengajuan_page', [PengajuanController::class, 'index'])->name('pengajuan.index');
