<?php

namespace App\Repositories;

use App\Interfaces\JudulRepositoryInterface;
use App\Models\JudulModel;

class JudulRepository implements JudulRepositoryInterface
{
    public function getAllJudul()
    {
        $judul = JudulModel::with('mahasiswaRole')->get();

        return $judul;
    }

    public function getJudulById($judul_id)
    {
    }

    public function createJudul(array $judulDetail)
    {
    }

    public function updateJudul($judul_id, array $newDetail)
    {
    }

    public function deleteJudul($judul_id)
    {
    }
}
