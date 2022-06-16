<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\PengajuanModel;
use App\Models\SisteminformasiModel;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $jadwalPengajuan = SisteminformasiModel::where('tgl_tutup', null)->latest('updated_at')->first();
        $pengajuan = PengajuanModel::with('mahasiswaRole', 'judulRole', 'detailTanggalRole');

        $dashboardData = array(
            'pengajuan' => $pengajuan->get(),
            'jadwal' => $jadwalPengajuan
        );

        return redirect()->view('Web.UserDashboard')->with('data', $dashboardData);
    }
}
