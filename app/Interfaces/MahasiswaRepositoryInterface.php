<?php

namespace App\Interfaces;

interface MahasiswaRepositoryInterface
{
    public function getAllMahasiswa();
    public function getMahasiswaById($mahasiswaId);
    public function createMahasiswa(array $mahasiswaDetails);
    public function updateMahasiswaById($mahasiswa_id, array $newDetails);
    public function deleteMahasiswa($mahasiswaId);
}
