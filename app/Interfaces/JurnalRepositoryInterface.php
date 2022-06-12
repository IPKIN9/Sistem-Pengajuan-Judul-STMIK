<?php

namespace App\Interfaces;

interface JurnalRepositoryInterface
{
    public function getAllJurnal();
    public function getJurnalById($jurnal_id);
    public function createJurnal(array $jurnalDetail);
    public function deleteJurnal($jurnal_id);
}
