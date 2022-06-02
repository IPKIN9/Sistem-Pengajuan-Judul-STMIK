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

    public function getMahasiswaById($mahasiswa_id)
    {
    }

    public function createMahasiswa(array $mahasiswa_details)
    {
    }

    public function updateMahasiswaById($mahasiswa_id, array $new_details)
    {
    }

    public function deleteMahasiswa($mahasiswa_id)
    {
    }
}
