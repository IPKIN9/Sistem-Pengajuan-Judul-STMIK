<?php

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use App\Models\AdminModel;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAllAdmin()
    {
        try {
            $admin = AdminModel::all();
        } catch (\Throwable $th) {
            $admin = $th->getMessage();
        }

        return $admin;
    }

    public function getAdminById($admin_id)
    {
    }

    public function createAdmin(array $adminDetails)
    {
        try {
            $dbResult = AdminModel::create($adminDetails);
            $admin = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'success',
                    'title' => 'Tersimpan',
                    'message' => 'Data berhasil disimpan',
                ),
                'code' => 201
            );
        } catch (\Throwable $th) {
            $admin = array(
                'data' => null,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => $th->getMessage(),
                ),
                'code' => 500
            );
        }

        return $admin;
    }

    public function updateAdmin($admin_id, array $newDetails)
    {
    }

    public function deleteAdmin($admin_id)
    {
    }
}
