<?php

namespace App\Interfaces;

interface DosenRepositoryInterface
{
    public function getAllDosen();
    public function getDosenById($dosenId);
    public function createDosen(array $newDetails);
    public function updateDosenById($dosenId, array $newDetails);
    public function deleteDosen($dosenId);
}
