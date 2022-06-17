<?php

namespace App\Repositories;

use App\Interfaces\PersyaratanInterface;
use App\Models\PersyaratanModel;

class PersyaratanRepository implements PersyaratanInterface
{
    public function getAllPersyaratan()
    {
        try {
            $dbResult = PersyaratanModel::first();
        } catch (\Throwable $th) {
            $dbResult = null;
        }

        return $dbResult;
    }

    public function getPersyaratanById($idPersyaratan)
    {
    }

    public function createPersyaratan(array $detailPersyaratan)
    {
        try {
            $fileUpload = $detailPersyaratan['format_file'];
            $nameFile = $fileUpload->getClientOriginalName();

            $detailPersyaratan['format_file'] = $nameFile;
            $dbResult = PersyaratanModel::create($detailPersyaratan);
            $persyaratan = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );;
            $filePath = public_path('storage/format_file/');
            $fileUpload->move($filePath, $fileUpload->getClientOriginalName());
        } catch (\Throwable $th) {
            $persyaratan = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }
        return $persyaratan;
    }

    public function updatePersyaratan($idPersyaratan, array $detailPersyaratan)
    {
    }

    public function deletePersyaratan($idPersyaratan)
    {
    }
}
