<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\PengajuanModel;
use App\Models\SisteminformasiModel;
use DateTime;

class UserDashboardController extends Controller
{
    public function index()
    {
        $jadwalDatabase = new SisteminformasiModel;
        // jadwal list dan buka tutup
        $jadwalList = $jadwalDatabase->orderBy('updated_at', 'desc')->limit(5)->get();
        // persyaratan
        $persyaratan = $jadwalDatabase->first();
        $dashboardData = array(
            'persyaratan' => $persyaratan ? $persyaratan->value('persyaratan') : null,
            'jadwal_list' => $jadwalList,
        );
        // return dd($dashboardData);
        return view('Web.UserDashboard')->with('data', $dashboardData);
    }
}
