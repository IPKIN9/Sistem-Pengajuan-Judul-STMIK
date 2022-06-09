<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\JudulRepositoryInterface;
use Illuminate\Http\Request;

class JudulController extends Controller
{
    public function __construct(JudulRepositoryInterface $judulRepository)
    {
        $this->judulRepository = $judulRepository;
    }

    public function index()
    {
        $judul = $this->judulRepository->getAllJudul();

        return response()->json($judul);
    }
}
