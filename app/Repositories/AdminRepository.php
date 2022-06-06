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
    }

    public function updateAdmin($admin_id, array $newDetails)
    {
    }

    public function deleteAdmin($admin_id)
    {
    }
}
