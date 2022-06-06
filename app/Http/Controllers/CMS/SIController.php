<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\SIRequest;
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

    public function createData(SIRequest $request)
    {
        $SIDetails = $request->only([
            'tgl_buka',
            'tgl_tutup',
            'sesi',
            'persyaratan',
        ]);

        $SI = $this->SIRepository->createSI($SIDetails);
        return response()->json($SI, $SI['code']);
    }
}
