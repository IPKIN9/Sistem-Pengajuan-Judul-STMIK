<?php

namespace App\Repositories;

use App\Interfaces\JudulRepositoryInterface;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;

class JudulRepository implements JudulRepositoryInterface
{
    public function getAllJudul()
    {
        $judul = JudulModel::with('mahasiswaRole')->get();

        return $judul;
    }

    public function getJudulById($judul_id)
    {
    }

    public function createJudul(array $judulDetail)
    {
        try {
            $findMahasiswa = MahasiswaModel::whereId($judulDetail['id_mahasiswa'])->first();
            if ($findMahasiswa) {
                $dbResult = JudulModel::create($judulDetail);
                $judul = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $judul = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data mahasiswa tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $judul = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $judul;
    }

    public function updateJudul($judul_id, array $newDetail)
    {
    }

    public function deleteJudul($judul_id)
    {
    }
}
