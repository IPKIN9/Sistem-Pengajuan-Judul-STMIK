<?php

namespace App\Repositories;

use App\Interfaces\PengajuanRepositoryInterface;
use App\Models\PengajuanModel;
use Carbon\Carbon;

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
        try {
            $dbResult = PengajuanModel::whereId($pengajuan_id)->with('mahasiswaRole', 'judulRole', 'detailTanggalRole')->first();
            if ($dbResult) {
                $pengajuan = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $pengajuan = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data pengajuan tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $pengajuan = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $pengajuan;
    }

    public function updatePengajuan($pengajuan_id, array $newDetail)
    {
        $date = Carbon::now();
        $newDetail['updated_at'] = $date;
        try {
            $dbResult = PengajuanModel::whereId($pengajuan_id);
            $findId = $dbResult->first();
            if ($findId) {
                $pengajuan = array(
                    'data' => $dbResult->update($newDetail),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $pengajuan = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data pengajuan tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $pengajuan = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return $pengajuan;
    }

    public function deletePengajuan($pengajuan_id)
    {
        try {
            $dbResult = PengajuanModel::whereId($pengajuan_id);
            $findId = $dbResult->first();

            if ($findId) {
                $pengajuan = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $pengajuan = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data pengajuan tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $pengajuan = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return $pengajuan;
    }
}
