<?php

namespace App\Repositories;

use App\Interfaces\DosenRepositoryInterface;
use App\Models\DosenModel;

class DosenRepository implements DosenRepositoryInterface
{
    public function getAllDosen()
    {
        $dosen = DosenModel::all();
        return $dosen;
    }

    public function createDosen(array $newDetails)
    {
    }

    public function getDosenById($dosenId)
    {
        try {
            $dbResult = DosenModel::whereId($dosenId)->first();
            if ($dbResult) {
                $dosen = array(
                    'data' => $dbResult,
                    'message' => "Success",
                    'code' => 200
                );
            } else {
                $dosen = array(
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
            $dosen = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $dosen;
    }

    public function updateDosenById($dosenId, array $newDetails)
    {
    }

    public function deleteDosen($dosenId)
    {
    }
}
