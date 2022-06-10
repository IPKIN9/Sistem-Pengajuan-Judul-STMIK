<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
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
}
