<?php

namespace App\Repositories;

use App\Interfaces\MahasiswaRepositoryInterface;
use App\Models\MahasiswaModel;

class MahasiswaRepository implements MahasiswaRepositoryInterface
{
    public function getAllMahasiswa()
    {
        $mahasiswa = MahasiswaModel::all();
        return $mahasiswa;
    }

    public function getMahasiswaById($mahasiswaId)
    {
    }

    public function createMahasiswa(array $mahasiswaDetails)
    {
        try {
            $data = MahasiswaModel::create($mahasiswaDetails);
            $message = 'Success to create data';
        } catch (\Throwable $th) {
            $data = null;
            $message = $th->getMessage();
        }
        $mahasiswa = array(
            'data' => $data,
            'message' => $message
        );
        return $mahasiswa;
    }

    public function updateMahasiswaById($mahasiswaId, array $newDetails)
    {
    }

    public function deleteMahasiswa($mahasiswaId)
    {
    }
}
