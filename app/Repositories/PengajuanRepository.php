<?php

namespace App\Repositories;

use App\Interfaces\PengajuanRepositoryInterface;
use App\Models\PengajuanModel;

class PengajuanRepository implements PengajuanRepositoryInterface
{
    public function getPengajuanAll()
    {
        $pengajuan = PengajuanModel::with('mahasiswa', 'judul', 'detail_tanggal')->get();

        return $pengajuan;
    }

    public function createPengajuan(array $pengajuanDetail)
    {
        try {
            $dbResult = PengajuanModel::create($pengajuanDetail);

            $pengajuan = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $pengajuan = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => 'Data gagal disimpan',
                ),
                'code' => 500
            );
        }
        return $pengajuan;
    }

    public function getPengajuanById($pengajuan_id)
    {
        $pengajuan = PengajuanModel::find($pengajuan_id);

        return $pengajuan;
    }

    public function updatePengajuan($pengajuan_id, array $newDetail)
    {
        $pengajuan = PengajuanModel::find($pengajuan_id);
        $pengajuan->update($newDetail);

        return $pengajuan;
    }

    public function deletePengajuan($pengajuan_id)
    {
    }
}
