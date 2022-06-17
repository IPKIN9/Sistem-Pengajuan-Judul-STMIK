<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class DetailPengajuan extends Controller
{
    public function getAllJudul($id)
    {
        $judul = JudulModel::whereId($id)->get();
    }
}
