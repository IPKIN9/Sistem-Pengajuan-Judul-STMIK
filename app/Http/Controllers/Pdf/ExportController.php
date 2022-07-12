<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportAllPengumuman($detail_tanggal)
    {
        $mahasiswa = MahasiswaModel::all();

        $data = '';

        $pengumuman = JudulModel::where('detail_tanggal', $detail_tanggal)->where('status', 'diterima')->orWhere('status', 'konfirmasi');
        $dataMhs = $mahasiswa->intersect(PengajuanModel::where('detail_tanggal', $detail_tanggal)->get());
        foreach ($dataMhs as $key => $value) {
            $data = array(
                'mahasiswa' => array(
                    'nama' => $value->nama,
                    'nim' => $value->nim,
                    'jurusan' => $value->jurusan,
                    'angkatan' => $value->angkatan,
                    'judul' => $pengumuman->where('id_mahasiswa', $value->id)->select(array('nama_judul', 'descJudul', 'status', 'jurnal'))->get(),
                ),
            );
        }
        return response()->json($data, 200);
    }
}
