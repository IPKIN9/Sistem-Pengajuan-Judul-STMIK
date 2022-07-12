<?php

namespace App\Repositories;

use App\Interfaces\PersyaratanInterface;
use App\Models\PersyaratanModel;
use Illuminate\Support\Facades\File;

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
            if (array_key_exists('format_file', $detailPersyaratan)) {
                File::delete(public_path('storage/format_file/' . $detailPersyaratan['old_file']));
                unset($detailPersyaratan['old_file']);
                $fileUpload = $detailPersyaratan['format_file'];
                $nameFile = $fileUpload->getClientOriginalName();

                $filePath = public_path('storage/format_file/');
                $fileUpload->move($filePath, $fileUpload->getClientOriginalName());
                $detailPersyaratan['format_file'] = $nameFile;
            } else {
                $detailPersyaratan['format_file'] = $detailPersyaratan['old_file'];
                unset($detailPersyaratan['old_file']);
            }
            $dataBaseCon = new PersyaratanModel;
            $getOne = $dataBaseCon->first();
            if ($getOne) {
                $dbResult = $dataBaseCon->whereId($getOne->id)->update($detailPersyaratan);
            } else {
                $dbResult = $dataBaseCon->create($detailPersyaratan);
            }

            $persyaratan = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
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
