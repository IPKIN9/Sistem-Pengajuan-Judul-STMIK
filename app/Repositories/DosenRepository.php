<?php

namespace App\Repositories;

use App\Interfaces\DosenRepositoryInterface;
use App\Models\DosenModel;

class DosenRepository implements DosenRepositoryInterface
{
    public function getAllDosen()
    {
        $dosen = DosenModel::all();
        return $dosen;
    }

    public function createDosen(array $newDetails)
    {
    }

    public function getDosenById($dosenId)
    {
    }

    public function updateDosenById($dosenId, array $newDetails)
    {
    }

    public function deleteDosen($dosenId)
    {
    }
}
