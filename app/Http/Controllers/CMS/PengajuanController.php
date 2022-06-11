<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
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
}
