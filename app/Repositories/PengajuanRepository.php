<?php

namespace App\Repositories;

use App\Interfaces\PengajuanRepositoryInterface;
use App\Models\PengajuanModel;

class PengajuanRepository implements PengajuanRepositoryInterface
{
    public function getPengajuanAll()
    {
        $pengajuan = PengajuanModel::all();

        return $pengajuan;
    }

    public function deletePengajuan($pengajuan_id)
    {
    }
}
