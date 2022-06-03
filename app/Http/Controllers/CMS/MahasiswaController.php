<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;
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

        return view('CMS.mahasiswa')->with('mahasiswa',$mahasiswa);
    }

    public function createMahasiswa(MahasiswaRequest $request)
    {
        $mahasiswaDetails = $request->only([
            'nama',
            'nim',
            'jurusan',
            'hp',
            'alamat',
            'jk',
            'angkatan',
            'kelas',
        ]);
        $mahasiswa = $this->mahasiswaRepository->createMahasiswa($mahasiswaDetails);
        return back()->with('status', 'Data baru berhasil ditambahkan', $mahasiswa);
    }
}
