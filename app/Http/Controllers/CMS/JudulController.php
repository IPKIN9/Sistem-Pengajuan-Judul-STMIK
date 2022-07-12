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

        return view('CMS.judul')->with('judul', $judul);
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

    public function updateData(JudulRequest $request, $id)
    {
        $newDetail = $request->only([
            'id_mahasiswa',
            'nama_judul',
            'descJudul',
        ]);

        $judul = $this->judulRepository->updateJudul($id, $newDetail);
        return response()->json($judul, $judul['code']);
    }

    public function deleteData($id)
    {
        $judul = $this->judulRepository->deleteJudul($id);

        return response()->json($judul, $judul['code']);
    }
}
