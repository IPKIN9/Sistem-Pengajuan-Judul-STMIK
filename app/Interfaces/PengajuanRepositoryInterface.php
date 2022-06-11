<?php

namespace App\Interfaces;

interface PengajuanRepositoryInterface
{
    public function getPengajuanAll();
    public function deletePengajuan($pengajuan_id);
}
