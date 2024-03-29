<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkripsiRequest;
use App\Interfaces\SkripsiRepositoryInterface;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function __construct(SkripsiRepositoryInterface $skripsiRepository)
    {
        $this->skripsiRepository = $skripsiRepository;
    }

    public function index()
    {
        $skripsi = $this->skripsiRepository->getAllSkripsi();
        return view('CMS.skripsi')->with('skripsi', $skripsi);
    }

    public function createData(SkripsiRequest $request)
    {
        $skripsiDetail = $request->only(
            'nama_judul',
            'peneliti',
            'tempat_penelitian',
            'abstrak',
            'pembimbing1',
            'pembimbing2',
            'tgl_terbit'
        );

        $skripsi = $this->skripsiRepository->createSkripsi($skripsiDetail);
        return response()->json($skripsi, $skripsi['code']);
    }

    public function getById($skrips_id)
    {
        $skripsi = $this->skripsiRepository->getSkripsiById($skrips_id);
        return response()->json($skripsi, $skripsi['code']);
    }

    public function updateData(SkripsiRequest $request, $skrips_id)
    {
        $skripsiDetail = $request->only(
            'nama_judul',
            'peneliti',
            'tempat_penelitian',
            'abstrak',
            'pembimbing1',
            'pembimbing2',
            'tgl_terbit'
        );

        $skripsi = $this->skripsiRepository->updateSkripsi($skrips_id, $skripsiDetail);
        return response()->json($skripsi, $skripsi['code']);
    }

    public function deleteData($skrips_id)
    {
        $skripsi = $this->skripsiRepository->deleteSkripsi($skrips_id);
        return response()->json($skripsi, $skripsi['code']);
    }
}
