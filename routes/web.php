<?php

use App\Http\Controllers\CMS\MahasiswaController;
use App\Http\Controllers\Contoh\ContohController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::prefix('mahasiswa')->group(function () {
    Route::get('/', [MahasiswaController::class, 'index']);
});
