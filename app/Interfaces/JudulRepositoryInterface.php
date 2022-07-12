<?php

namespace App\Interfaces;

interface JudulRepositoryInterface
{
    public function getAllJudul();
    public function getJudulById($judul_id);
    public function createJudul(array $judulDetail);
    public function updateJudul($judul_id, array $newDetail);
    public function deleteJudul($judul_id);
}
