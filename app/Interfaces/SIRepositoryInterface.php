<?php

namespace App\Interfaces;

interface SIRepositoryInterface
{
    public function getAllSI();
    public function getSIById($SI_id);
    public function createSI($SI_id, array $newDetails);
    public function updateSI($SI_id, array $newDetails);
    public function deleteSI($SI_id);
}
