<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Interfaces\PersyaratanInterface;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function __construct(PersyaratanInterface $persyaratanRepository)
    {
        $this->persyaratanRepository = $persyaratanRepository;
    }

    public function index()
    {
        $persyaratan = $this->persyaratanRepository->getAllPersyaratan();
        return view('CMS.persyaratan')->with('data', $persyaratan);
    }

    public function createData(Request $request)
    {
        $persyaratanDetail = $request->only([
            'persyaratan',
            'format_file',
            'old_file',
        ]);
        $persyaratan = $this->persyaratanRepository->createPersyaratan($persyaratanDetail);
        // return response()->json($persyaratanDetail);
        return response()->json($persyaratan, $persyaratan['code']);
    }
}
