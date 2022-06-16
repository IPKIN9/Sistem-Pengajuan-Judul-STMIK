<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class DetailPengajuan extends Controller
{
    public function getById($id)
    {
        $dbResult = PengajuanModel::where('detail_tanggal', $id)->with('mahasiswaRole')->get();
        // return response()->json($dbResult);        
        return view('CMS.validation_detail')->with('dbResult', $dbResult);
    }

    public function getAllJudul($id)
    {
        $dbResult = JudulModel::where('id_mahasiswa', $id)->get();
        return response()->json($dbResult);
    }
}
