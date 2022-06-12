<?php

namespace App\Interfaces;

interface SkripsiRepositoryInterface
{
    public function getAllSkripsi();
    public function getSkripsiById($skrips_id);
    public function createSkripsi(array $skripsiDetail);
    public function updateSkripsi($skrips_id, array $newDetail);
    public function deleteSkripsi($skrips_id);
}
