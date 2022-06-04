<?php

use App\Http\Controllers\CMS\DosenController;
use App\Http\Controllers\CMS\MahasiswaController;
use Illuminate\Support\Facades\Route;


route::get('/', function () {
    return view('CMS.dashboard');
});

Route::get('/swagger-doc', function () {
    return view('Swagger.index');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
