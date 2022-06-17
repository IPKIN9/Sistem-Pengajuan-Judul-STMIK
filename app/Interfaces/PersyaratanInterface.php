<?php

namespace App\Interfaces;

interface PersyaratanInterface
{
    public function getAllPersyaratan();
    public function getPersyaratanById($idPersyaratan);
    public function createPersyaratan(array $detailPersyaratan);
    public function updatePersyaratan($idPersyaratan, array $detailPersyaratan);
    public function deletePersyaratan($idPersyaratan);
}
