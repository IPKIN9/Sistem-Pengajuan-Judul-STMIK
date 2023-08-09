<?php

namespace App\Interfaces;

interface PengajuanRepositoryInterface
{
    public function getPengajuanAll();
    public function createPengajuan(array $pengajuanDetail);
    public function getPengajuanById($pengajuan_id);
    public function updatePengajuan($pengajuan_id, array $newDetail);
    public function deletePengajuan($pengajuan_id);
}
