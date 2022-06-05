<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\SIRepositoryInterface;
use Illuminate\Http\Request;

class SIController extends Controller
{
    public function __construct(SIRepositoryInterface $SIRepository)
    {
        $this->SIRepository = $SIRepository;
    }

    public function index()
    {
        $SI = $this->SIRepository->getAllSI();

        return response()->json($SI);
    }
}
