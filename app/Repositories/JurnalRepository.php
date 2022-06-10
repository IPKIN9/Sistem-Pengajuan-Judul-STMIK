<?php

namespace App\Repositories;

use App\Interfaces\JurnalRepositoryInterface;
use App\Models\JudulModel;
use App\Models\JurnalModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class JurnalRepository implements JurnalRepositoryInterface
{
    public function getAllJurnal()
    {
        $passData = array(
            'jurnal' => JurnalModel::with('judulRole')->get(),
            'judul' => JudulModel::all()
        );

        return $passData;
    }

    public function getJurnalById($jurnal_id)
    {
        try {
            $dbResult = JurnalModel::whereId($jurnal_id)->with('judulRole')->first();
            if ($dbResult) {
                $jurnal = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
            } else {
                $jurnal = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data jurnal tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $jurnal = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $jurnal;
    }

    public function createJurnal(array $jurnalDetail)
    {
        try {
            $findJudul = JudulModel::whereId($jurnalDetail['id_judul'])->first();
            $fileUpload = $jurnalDetail['path_file'];

            $jurnalDetail['path_file'] = $fileUpload->getClientOriginalName();
            $dbResult = new JurnalModel;

            if ($findJudul) {
                $jurnal = array(
                    'data' => $dbResult->create($jurnalDetail),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil disimpan',
                    ),
                    'code' => 201
                );
                $filePath = public_path('storage/jurnal');
                $fileUpload->move($filePath, $fileUpload->getClientOriginalName());
            } else {
                $jurnal = array(
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
            $jurnal = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $jurnal;
    }

    public function updateJurnal($jurnal_id, array $newDetail)
    {
        $date = Carbon::now();
        $newDetail['updated_at'] = $date;
        try {
            $dbResult = JurnalModel::whereId($jurnal_id);
            $findJurnal = $dbResult->first();
            $findJudul = JudulModel::whereId($newDetail['id_judul'])->first();
            if ($findJurnal and $findJudul) {
                $jurnal = array(
                    'data' => $dbResult->update($newDetail),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil diperbaharui',
                    ),
                    'code' => 201
                );
            } else {
                $jurnal = array(
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
            $jurnal = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $jurnal;
    }

    public function deleteJurnal($jurnal_id)
    {
        try {
            $dbResult = JurnalModel::whereId($jurnal_id);
            $findJurnal = $dbResult->first();
            if ($findJurnal) {
                $jurnal = array(
                    'data' => $dbResult->delete($jurnal_id),
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Tersimpan',
                        'message' => 'Data berhasil dihapus',
                    ),
                    'code' => 201
                );
            } else {
                $jurnal = array(
                    'data' => null,
                    'response' => array(
                        'icon' => 'warning',
                        'title' => 'Not Found',
                        'message' => 'Data jurnal tidak tersedia',
                    ),
                    'code' => 404
                );
            }
        } catch (\Throwable $th) {
            $jurnal = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $jurnal;
    }
}
