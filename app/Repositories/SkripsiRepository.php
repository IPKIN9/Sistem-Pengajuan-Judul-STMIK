<?php

namespace App\Repositories;

use App\Interfaces\SkripsiRepositoryInterface;
use App\Models\SkripsiModel;
use Carbon\Carbon;

class SkripsiRepository implements SkripsiRepositoryInterface
{
    public function getAllSkripsi()
    {
        $skripsi = SkripsiModel::all();
        return $skripsi;
    }

    public function getSkripsiById($skrips_id)
    {
        try {
            $dbResult = SkripsiModel::whereId($skrips_id)->first();
            if ($dbResult) {
                $skripsi = array(
                    'data' => $dbResult,
                    'message' => "Success",
                    'code' => 200
                );
            } else {
                $skripsi = array(
                    'data' => $dbResult,
                    'message' => "Data not found",
                    'code' => 404
                );
            }
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
        $date = Carbon::now();
        $newDetail['updated_at'] = $date;
        try {
            $dbResult = SkripsiModel::whereId($skrips_id);
            $findId = $dbResult->first();

            if ($findId) {
                $skripsi = array(
                    'data' => $dbResult->update($newDetail),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $skripsi = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'error',
                        'title' => 'Gagal',
                        'message' => 'Data tidak ditemukan',
                    ),
                    'code' => 404
                );
            }
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

    public function deleteSkripsi($skrips_id)
    {
    }
}
