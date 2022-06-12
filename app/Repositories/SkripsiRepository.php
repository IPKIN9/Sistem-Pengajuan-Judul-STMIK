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
        try {
            $dbResult = SkripsiModel::create($skripsiDetail);
            $skripsi = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $skripsi = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return $skripsi;
    }

    public function updateSkripsi($skrips_id, array $newDetail)
    {
    }

    public function deleteSkripsi($skrips_id)
    {
    }
}
