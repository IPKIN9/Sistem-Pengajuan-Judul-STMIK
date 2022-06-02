<?php

namespace App\Interfaces;

interface MahasiswaRepositoryInterface
{
    public function getAllMahasiswa();
    public function getMahasiswaById($mahasiswa_id);
    public function createMahasiswa(array $mahasiswa_details);
    public function updateMahasiswaById($mahasiswa_id, array $new_details);
    public function deleteMahasiswa($mahasiswa_id);
}
