<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\PengajuanModel;
use App\Models\PersyaratanModel;
use App\Models\SisteminformasiModel;
use DateTime;

class UserDashboardController extends Controller
{
    public function index()
    {
        $jadwalDatabase = new SisteminformasiModel;
        // jadwal list dan buka tutup
        $jadwalList = $jadwalDatabase->orderBy('created_at', 'desc')->limit(5)->get();
        // persyaratan
        $persyaratan = PersyaratanModel::first();
        // download pdf
        $exportPdf = SisteminformasiModel::where('rilis', 1)->get();
        $dashboardData = array(
            'persyaratan' => $persyaratan ? $persyaratan : null,
            'jadwal_list' => $jadwalList,
            'export_pdf' => $exportPdf,
        );
        // return dd($dashboardData);
        return view('Web.pengajuanUser')->with('data', $dashboardData);
    }
}
