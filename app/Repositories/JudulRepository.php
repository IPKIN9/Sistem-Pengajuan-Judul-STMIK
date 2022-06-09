<?php

namespace App\Repositories;

use App\Interfaces\JudulRepositoryInterface;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;
use Carbon\Carbon;

class JudulRepository implements JudulRepositoryInterface
{
    public function getAllJudul()
    {
        $judul = array(
            'judul' => JudulModel::with('mahasiswaRole')->get(),
            'mahasiswa' => MahasiswaModel::all()
        );

        return $judul;
    }

    public function getJudulById($judul_id)
    {
        try {
            $dbResult = JudulModel::whereId($judul_id)->with('mahasiswaRole')->first();
            if ($dbResult) {
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
                        'message' => 'Data judul tidak tersedia',
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
                        'message' => 'Data mahasiswa tidak tersedia',
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
        $date = Carbon::now();
        $newDetail['updated_at'] = $date;
        try {
            $dbResult = JudulModel::whereId($judul_id)->where('id_mahasiswa', $newDetail['id_mahasiswa']);
            $findMahasiswa = $dbResult->first();
            if ($findMahasiswa) {
                $judul = array(
                    'data' => $dbResult->update($newDetail),
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
                        'message' => 'Data judul atau mahasiswa tersedia',
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

    public function deleteJudul($judul_id)
    {
        try {
            $dbResult = JudulModel::whereId($judul_id);
            $findId = $dbResult->first();

            if ($findId) {
                $judul = array(
                    'data' => $dbResult->delete(),
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
                        'message' => 'Data judul atau mahasiswa tersedia',
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
}
