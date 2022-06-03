<?php

namespace App\Repositories;

use App\Interfaces\MahasiswaRepositoryInterface;
use App\Models\MahasiswaModel;
use Carbon\Carbon;

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
            $mahasiswa = array(
                'data' => MahasiswaModel::create($mahasiswaDetails),
                'message' => 'Success to create data',
                'code' => 201
            );
        } catch (\Throwable $th) {
            $mahasiswa = array(
                'data' => null,
                'message' => $th->getMessage(),
                'code' => 500
            );
        }
        return $mahasiswa;
    }

    public function updateMahasiswaById($mahasiswaId, array $newDetails)
    {
        $dateNow = Carbon::now();
        $newDetails['updated_at'] = $dateNow;
        try {
            $findId = MahasiswaModel::whereId($mahasiswaId);
            if (count($findId->get()) >= 1) {
                $dbResult = $findId->update($newDetails);
                $mahasiswa = array(
                    'data ' => $dbResult,
                    'message' => 'Success',
                    'code' => 201
                );
            } else {
                $mahasiswa = array(
                    'data' => null,
                    'message' => 'Mahasiswa not found',
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

    public function deleteMahasiswa($mahasiswaId)
    {
    }
}
