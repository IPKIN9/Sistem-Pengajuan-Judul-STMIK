<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\JurnalRequest;
use App\Interfaces\JurnalRepositoryInterface;
use Illuminate\Http\Request;

class JurnalController extends Controller
{
    public function __construct(JurnalRepositoryInterface $jurnalRepository)
    {
        $this->jurnalRepository = $jurnalRepository;
    }

    public function index()
    {
        $jurnal = $this->jurnalRepository->getAllJurnal();

        return response()->json($jurnal);
    }

    public function createData(JurnalRequest $request)
    {
        $jurnalDetail = $request->only(
            'id_judul',
            'nama_jurnal',
            'sumber',
            'descJurnal',
            'ISSN',
            'tahunterbit',
            'path_file',
        );

        $jurnal = $this->jurnalRepository->createJurnal($jurnalDetail);
        return response()->json($jurnal, $jurnal['code']);
    }

    public function getById($id)
    {
        $jurnal = $this->jurnalRepository->getJurnalById($id);

        return response()->json($jurnal, $jurnal['code']);
    }

    public function updateData(JurnalRequest $request, $id)
    {
        $newDetail = $request->only(
            'id_judul',
            'nama_jurnal',
            'sumber',
            'descJurnal',
            'ISSN',
            'tahunterbit',
            'path_file',
        );

        $jurnal = $this->jurnalRepository->updateJurnal($id, $newDetail);

        return response()->json($jurnal, $jurnal['code']);
    }
}
