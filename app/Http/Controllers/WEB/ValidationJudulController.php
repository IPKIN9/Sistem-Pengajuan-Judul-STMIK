<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\SisteminformasiModel;
use Illuminate\Http\Request;

class ValidationJudulController extends Controller
{
    public function index()
    {
        $data = SisteminformasiModel::where('tgl_buka', '<=', date('Y-m-d'))->where('tgl_tutup', '>', date('Y-m-d'))->get();
        return view('CMS.validasi_judul')->with('data', $data);
    }

    public function getJudulBySesion($id)
    {
        $data = SisteminformasiModel::whereId($id)->with('sistemInformasiChild.mahasiswaRole')->first();
        return response()->json($data['sistemInformasiChild'], 200);
    }

    public function updateStatus($id, Request $request)
    {
        $dbCon = new JudulModel;
        try {
            foreach ($request->idJudul as $key => $value) {
                $idJudul = $request->idJudul[$key];
                $dbResult = $dbCon->whereId($idJudul)->update([
                    'status' => $request->status[$key],
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                $judul = array(
                    'data' => $dbResult,
                    'response' => array(
                        'icon' => 'success',
                        'title' => 'Ditemukan',
                        'message' => 'Data berhasil ditemukan',
                    ),
                    'code' => 201
                );
            }
        } catch (\Throwable $th) {
            $judul = array(
                'data' => $dbResult,
                'response' => array(
                    'icon' => 'error',
                    'title' => 'Gagal',
                    'message' => 'Data gagal ditemukan',
                ),
                'code' => 500
            );
        }
        return response()->json($judul, $judul['code']);
    }
}
