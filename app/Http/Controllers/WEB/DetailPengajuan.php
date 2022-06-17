<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class DetailPengajuan extends Controller
{
    public function getAllJudul($idMahasiswa, $idJadwal)
    {
        $judul = JudulModel::where('id_mahasiswa', $idMahasiswa)->where('detail_tanggal', $idJadwal)->get();
        return response()->json($judul, 200);
    }
}
