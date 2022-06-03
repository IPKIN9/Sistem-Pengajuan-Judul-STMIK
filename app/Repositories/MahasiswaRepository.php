<?php

namespace App\Repositories;

use App\Interfaces\MahasiswaRepositoryInterface;
use App\Models\MahasiswaModel;

class MahasiswaRepository implements MahasiswaRepositoryInterface
{
    public function getAllMahasiswa()
    {
        $mahasiswa = MahasiswaModel::all();
        return $mahasiswa;
    }

    public function getMahasiswaById($mahasiswaId)
    {
        try {
            $dbResult = MahasiswaModel::whereId($mahasiswaId)->get();
            if (count($dbResult) >= 1) {
                $mahasiswa = array(
                    'data' => $dbResult,
                    'message' => "Success",
                    'code' => 200
                );
            } else {
                $mahasiswa = array(
                    'data' => null,
                    'message' => "Id mahasiswa not found",
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $mahasiswa = array(
                'data' => null,
                'message' => $th->getMessage(),
                'code' => 500
            );
        }

        return $mahasiswa;
    }

    public function createMahasiswa(array $mahasiswaDetails)
    {
        try {
            $data = MahasiswaModel::create($mahasiswaDetails);
            $message = 'Success to create data';
        } catch (\Throwable $th) {
            $data = null;
            $message = $th->getMessage();
        }
        $mahasiswa = array(
            'data' => $data,
            'message' => $message
        );
        return $mahasiswa;
    }

    public function updateMahasiswaById($mahasiswaId, array $newDetails)
    {
    }

    public function deleteMahasiswa($mahasiswaId)
    {
    }
}
