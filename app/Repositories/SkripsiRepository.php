<?php

namespace App\Repositories;

use App\Interfaces\SkripsiRepositoryInterface;
use App\Models\SkripsiModel;

class SkripsiRepository implements SkripsiRepositoryInterface
{
    public function getAllSkripsi()
    {
        $skripsi = SkripsiModel::all();
        return $skripsi;
    }

    public function getSkripsiById($skrips_id)
    {
    }

    public function createSkripsi(array $skripsiDetail)
    {
    }

    public function updateSkripsi($skrips_id, array $newDetail)
    {
    }

    public function deleteSkripsi($skrips_id)
    {
    }
}
