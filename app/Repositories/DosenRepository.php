<?php

namespace App\Repositories;

use App\Interfaces\DosenRepositoryInterface;
use App\Models\DosenModel;
use Carbon\Carbon;

class DosenRepository implements DosenRepositoryInterface
{
    public function getAllDosen()
    {
        $dosen = DosenModel::all();
        return $dosen;
    }

    public function createDosen(array $newDetails)
    {
        try {
            $dbResult = DosenModel::create($newDetails);
            $dosen = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
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
        $date = Carbon::now();
        $newDetails['updated_at'] = $date;
        try {
            $dbResult = DosenModel::whereId($dosenId);
            $findId = $dbResult->first();
            if ($findId) {
                $dosen = array(
                    'data' => $dbResult->update($newDetails),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
                    ),
                    'code' => 201
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

    public function deleteDosen($dosenId)
    {
        try {
            $dbResult = DosenModel::whereId($dosenId);
            $findId = $dbResult->first();
            if ($findId) {
                $dosen = array(
                    'data' => $dbResult->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
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
}
