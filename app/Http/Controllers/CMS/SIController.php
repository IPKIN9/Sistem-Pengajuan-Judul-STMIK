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

        return view('CMS.sistemInformasi')->with('SI', $SI);
    }

    public function createData(SIRequest $request)
    {
        $SIDetails = $request->only([
            'tgl_buka',
            'tgl_tutup',
            'sesi',
        ]);

        $SI = $this->SIRepository->createSI($SIDetails);
        return response()->json($SI, $SI['code']);
    }

    public function getById($id)
    {
        $SI = $this->SIRepository->getSIById($id);

        return response()->json($SI, $SI['code']);
    }

    public function updateInSI(Request $request, $id)
    {
        $SIDetails = $request->all();

        $SI = $this->SIRepository->updateSI($id, $SIDetails);
        return response()->json($SI, $SI['code']);
    }

    public function deleteData($id)
    {
        $SI = $this->SIRepository->deleteSI($id);

        return response()->json($SI, $SI['code']);
    }
}
