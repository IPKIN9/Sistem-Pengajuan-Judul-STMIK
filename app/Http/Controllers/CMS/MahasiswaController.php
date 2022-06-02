<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\MahasiswaRepositoryInterface;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct(MahasiswaRepositoryInterface $mahasiswaRepository)
    {
        $this->mahasiswaRepository = $mahasiswaRepository;
    }

    public function index()
    {
        $mahasiswa = $this->mahasiswaRepository->getAllMahasiswa();

        return response()->json($mahasiswa);
        // view('view path')->with($mahasiswa);
    }
}
