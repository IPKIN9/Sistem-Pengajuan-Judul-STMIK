<?php

namespace App\Interfaces;

interface AdminRepositoryInterface
{
    public function getAllAdmin();
    public function getAdminById($admin_id);
    public function createAdmin(array $adminDetails);
    public function updateAdmin($admin_id, array $newDetails);
    public function deleteAdmin($admin_id);
}
