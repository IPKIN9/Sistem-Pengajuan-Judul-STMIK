<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\SisteminformasiModel;
use Illuminate\Http\Request;

class ValidationJudulController extends Controller
{
    public function index()
    {
        $data = SisteminformasiModel::all();
        return view('CMS.validasi_judul')->with('data', $data);
    }
}
