<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CMS\AdminController;
use App\Http\Controllers\CMS\DosenController;
use App\Http\Controllers\CMS\JudulController;
use App\Http\Controllers\CMS\JurnalController;
use App\Http\Controllers\CMS\MahasiswaController;
use App\Http\Controllers\CMS\PengajuanController;
use App\Http\Controllers\CMS\PersyaratanController;
use App\Http\Controllers\CMS\SIController;
use App\Http\Controllers\CMS\SkripsiController;
use App\Http\Controllers\WEB\DetailPengajuan;
use App\Http\Controllers\WEB\UserDashboardController;
use App\Http\Controllers\WEB\ValidationJudulController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserDashboardController::class, 'index'])->name('user.dash');
Route::get('/pengajuan_user', function () {
    return view('Web.JudulUser');
});
Route::middleware(['auth', 'role:suadmin|user'])->group(function () {
    route::get('/admin_panel', function () {
        return view('CMS.dashboard');
    })->name('home');
    Route::get('/swagger-doc', function () {
        return view('Swagger.index');
    });

    Route::get('/judul_validation', [ValidationJudulController::class, 'index'])->name('judul.validation');
    Route::get('/judul_validation/{id}', [DetailPengajuan::class, 'getById'])->name('judul.validation.detail');
    Route::get('/detail_judul/{id}', [DetailPengajuan::class, 'getAllJudul']);
});

Route::prefix('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'checkCredential'])->name('login.check');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:suadmin',])->group(function () {
    Route::get('/mahasiswa_page', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/dosen_page', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/sistem_informasi_page', [SIController::class, 'index'])->name('si.index');
    Route::get('/admin_page', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/judul_page', [JudulController::class, 'index'])->name('judul.index');
    Route::get('/jurnal_page', [JurnalController::class, 'index'])->name('jurnal.index');
    Route::get('/pengajuan_page', [PengajuanController::class, 'index'])->name('pengajuan.index');
    Route::get('/skripsi_page', [SkripsiController::class, 'index'])->name('skripsi.index');
    Route::get('/persyaratan_page', [PersyaratanController::class, 'index'])->name('persyaratan.index');
});

Route::prefix('api')->middleware('auth')->group(function () {
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
        Route::patch('/{id}', [PengajuanController::class, 'updateData']);
        Route::delete('/{id}', [PengajuanController::class, 'deleteData']);
    });

    Route::prefix('skripsi')->group(function () {
        Route::post('/', [SkripsiController::class, 'createData']);
        Route::get('/{id}', [SkripsiController::class, 'getById']);
        Route::patch('/{id}', [SkripsiController::class, 'updateData']);
        Route::delete('/{id}', [SkripsiController::class, 'deleteData']);
    });

    Route::prefix('persyaratan')->group(function () {
        Route::post('/', [PersyaratanController::class, 'createData']);
        Route::get('/{id}', [PersyaratanController::class, 'getById']);
        Route::patch('/{id}', [PersyaratanController::class, 'updateData']);
        Route::delete('/{id}', [PersyaratanController::class, 'deleteData']);
    });

    Route::prefix('judul_validation')->group(function () {
        Route::get('/{id}', [ValidationJudulController::class, 'getJudulBySesion']);
        Route::get('/detail/{idMhs}/{idJadwal}', [DetailPengajuan::class, 'getAllJudul']);
    });
});
