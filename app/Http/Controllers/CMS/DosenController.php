<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\DosenRequest;
use App\Http\Requests\MahasiswaRequest;
use App\Interfaces\DosenRepositoryInterface;

class DosenController extends Controller
{
    public function __construct(DosenRepositoryInterface $dosenRepository)
    {
        $this->dosenRepository = $dosenRepository;
    }

    public function index()
    {
        $dosen = $this->dosenRepository->getAllDosen();

        return response()->json($dosen);
    }

    public function createInDosen(DosenRequest $request)
    {
        $dosenDetails = $request->only([
            'nama',
            'NIDN',
            'jabatan'
        ]);

        $dosen = $this->dosenRepository->createDosen($dosenDetails);
        return response()->json($dosen, $dosen['code']);
    }

    public function getById($id)
    {
        $dosen = $this->dosenRepository->getDosenById($id);

        return response()->json($dosen, $dosen['code']);
    }

    public function updateById(DosenRequest $request, $id)
    {
        $newDetails = $request->only(
            [
                'nama',
                'NIDN',
                'jabatan'
            ]
        );

        $dosen = $this->dosenRepository->updateDosenById($id, $newDetails);
        return response()->json($dosen, $dosen['code']);
    }
}
