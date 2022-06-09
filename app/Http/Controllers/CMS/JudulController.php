<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\JudulRequest;
use App\Interfaces\JudulRepositoryInterface;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    public function __construct(JudulRepositoryInterface $judulRepository)
    {
        $this->judulRepository = $judulRepository;
    }

    public function index()
    {
        $judul = $this->judulRepository->getAllJudul();

        return response()->json($judul);
    }

    public function createData(JudulRequest $request)
    {
        $judulDetail = $request->only([
            'id_mahasiswa',
            'nama_judul',
            'descJudul',
        ]);
        $judul = $this->judulRepository->createJudul($judulDetail);

        return response()->json($judul, $judul['code']);
    }

    public function getById($id)
    {
        $judul = $this->judulRepository->getJudulById($id);

        return response()->json($judul, $judul['code']);
    }
}
