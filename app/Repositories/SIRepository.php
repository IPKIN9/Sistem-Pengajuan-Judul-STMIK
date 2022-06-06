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
        try {
            $dbResult = SisteminformasiModel::whereId($SI_id)->first();
            if ($dbResult) {
                $SI = array(
                    'data' => $dbResult,
                    'message' => "Success",
                    'code' => 200
                );
            } else {
                $SI = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $SI = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $SI;
    }

    public function createSI(array $newDetails)
    {
        try {
            $dbResult = SisteminformasiModel::create($newDetails);
            $SI = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $SI = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $SI;
    }

    public function updateSI($SI_id, array $newDetails)
    {
    }

    public function deleteSI($SI_id)
    {
    }
}
