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

        return view('CMS.mahasiswa')->with('mahasiswa', $mahasiswa);
    }

    public function getById($id)
    {
        $mahasiswa = $this->mahasiswaRepository->getMahasiswaById($id);

        return response()->json($mahasiswa, $mahasiswa['code']);
    }

    public function getByNim($id, $idtanggal)
    {
        $mahasiswa = $this->mahasiswaRepository->getMahasiswaByNim($id, $idtanggal);

        return response()->json($mahasiswa, $mahasiswa['code']);
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
        return response()->json($mahasiswa, $mahasiswa['code']);
    }

    public function updateMahasiswa(MahasiswaRequest $request, $id)
    {
        $mahasiswaDetails = $request->only(
            'nama',
            'nim',
            'jurusan',
            'hp',
            'alamat',
            'jk',
            'angkatan',
            'kelas',
        );

        $mahasiswa = $this->mahasiswaRepository->updateMahasiswaById($id, $mahasiswaDetails);

        return response()->json($mahasiswa, $mahasiswa['code']);
    }

    public function deleteMahasiswa($id)
    {
        $mahasiswa = $this->mahasiswaRepository->deleteMahasiswa($id);

        return response()->json($mahasiswa, $mahasiswa['code']);
    }
}
