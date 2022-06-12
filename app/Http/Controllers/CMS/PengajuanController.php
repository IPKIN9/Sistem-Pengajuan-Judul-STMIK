<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanRequest;
use App\Interfaces\PengajuanRepositoryInterface;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function __construct(PengajuanRepositoryInterface $pengajuanRepository)
    {
        $this->pengajuanRepository = $pengajuanRepository;
    }

    public function index()
    {
        $pengajuan = $this->pengajuanRepository->getPengajuanAll();

        return response()->json($pengajuan);
    }

    public function createData(PengajuanRequest $request)
    {
        $pengajuanDetail = $request->only(
            'id_mahasiswa',
            'id_judul',
            'status',
            'detail_tanggal'
        );
        $pengajuan = $this->pengajuanRepository->createPengajuan($pengajuanDetail);

        return response()->json($pengajuan);
    }
}
