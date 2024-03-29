<?php

namespace App\Repositories;

use App\Interfaces\MahasiswaRepositoryInterface;
use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
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
            $dbResult = MahasiswaModel::whereId($mahasiswaId)->first();
            if ($dbResult) {
                $mahasiswa = array(
                    'data' => $dbResult,
                    'message' => "Success",
                    'code' => 200
                );
            } else {
                $mahasiswa = array(
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
            $mahasiswa = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $mahasiswa;
    }

    public function getMahasiswaByNim($nim, $idtanggal)
    {
        try {
            $dbResult = MahasiswaModel::where('nim', $nim)->first();
            if ($dbResult) {
                $checkPengajuan = PengajuanModel::where('id_mahasiswa', $dbResult->id)->where('detail_tanggal', $idtanggal)->first();
                if ($checkPengajuan) {
                    $mahasiswa = array(
                        'data' => null,
                        'message' => "Sudah pernah pengajuan",
                        'code' => 402
                    );
                } else {
                    $mahasiswa = array(
                        'data' => $dbResult,
                        'message' => "Data ditemukan",
                        'code' => 200
                    );
                }
            } else {
                $mahasiswa = array(
                    'data' => null,
                    'message' => "Data tidak ditemukan",
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
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $mahasiswa = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
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
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
                    ),
                    'code' => 201
                );
            } else {
                $mahasiswa = array(
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
            $mahasiswa = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $mahasiswa;
    }

    public function deleteMahasiswa($mahasiswaId)
    {
        try {
            $findId = MahasiswaModel::whereId($mahasiswaId);
            if ($findId->count() >= 1) {
                $mahasiswa = array(
                    'data' => $findId->delete(),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Terhapus',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $mahasiswa = array(
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
            $mahasiswa = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $mahasiswa;
    }
}
