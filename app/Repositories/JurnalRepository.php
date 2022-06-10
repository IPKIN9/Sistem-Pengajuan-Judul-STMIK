<?php

namespace App\Repositories;

use App\Interfaces\JurnalRepositoryInterface;
use App\Models\JudulModel;
use App\Models\JurnalModel;

class JurnalRepository implements JurnalRepositoryInterface
{
    public function getAllJurnal()
    {
        $passData = array(
            'jurnal' => JurnalModel::with('judulRole')->get(),
            'judul' => JudulModel::all()
        );

        return $passData;
    }

    public function getJurnalById($jurnal_id)
    {
    }

    public function createJurnal(array $jurnalDetail)
    {
    }

    public function updateJurnal($jurnal_id, array $newDetail)
    {
    }

    public function deleteJurnal($jurnal_id)
    {
    }
}
