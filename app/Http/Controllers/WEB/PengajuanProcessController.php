<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanProcessRequest;
use App\Models\JudulModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class PengajuanProcessController extends Controller
{
    public function getId($id)
    {
        return view('Web.JudulUser')->with('id', $id);
    }

    public function createPengajuan(PengajuanProcessRequest $request)
    {
        $idMahasiswa = $request->id_mahasiswa;
        $idTanggal = $request->id_tanggal;
        try {
            foreach ($request->nama_judul as $key => $value) {
                JudulModel::create([
                    'id_mahasiswa' => $idMahasiswa,
                    'detail_tanggal' => $idTanggal,
                    'nama_judul' => $request->nama_judul[$key],
                    'descJudul' => $request->descJudul[$key],
                    'jurnal' => $request->jurnal[$key],
                ]);
            }
            PengajuanModel::create([
                'id_mahasiswa' => $idMahasiswa,
                'detail_tanggal' => $idTanggal
            ]);
            return redirect()->route('user.dash')->with('status', 'Pengajuan berhasil dikirim');
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
            // return redirect()->back()->withErrors('Pengajuan berhasil dikirim');
        }
    }
}
