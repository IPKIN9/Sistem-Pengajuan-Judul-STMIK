<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\SkripsiRepositoryInterface;
use Illuminate\Http\Request;

class SkripsiController extends Controller
{
    public function __construct(SkripsiRepositoryInterface $skripsiRepository)
    {
        $this->skripsiRepository = $skripsiRepository;
    }

    public function index()
    {
        $skripsi = $this->skripsiRepository->getAllSkripsi();
        return response()->json($skripsi);
    }
}
