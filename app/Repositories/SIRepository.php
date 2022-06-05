<?php

namespace App\Repositories;

use App\Interfaces\SIRepositoryInterface;
use App\Models\SisteminformasiModel;

class SIRepository implements SIRepositoryInterface
{
    public function getAllSI()
    {
        $SI = SisteminformasiModel::all();

        return $SI;
    }

    public function getSIById($SI_id)
    {
    }

    public function createSI($SI_id, array $newDetails)
    {
    }

    public function updateSI($SI_id, array $newDetails)
    {
    }

    public function deleteSI($SI_id)
    {
    }
}
