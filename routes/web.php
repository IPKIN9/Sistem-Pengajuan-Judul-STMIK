<?php

use App\Http\Controllers\CMS\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', function () {
    return view('CMS.dashboard');
});

Route::get('/swagger-doc', function () {
    return view('Swagger.index');
});

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::post('/create', [MahasiswaController::class, 'createMahasiswa'])->name('mahasiswa.create');
});
