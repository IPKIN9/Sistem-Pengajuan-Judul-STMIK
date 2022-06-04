<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
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

    public function getById($id)
    {
        $dosen = $this->dosenRepository->getDosenById($id);

        return response()->json($dosen, $dosen['code']);
    }
}
