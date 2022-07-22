<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\PengajuanModel;
use \Mpdf\Mpdf as PDF;

class ExportController extends Controller
{
    public function exportAllPengumuman($detail_tanggal)
    {
        $pengumuman = PengajuanModel::where('detail_tanggal', $detail_tanggal)->with('mahasiswaRole')->get();
        $judul = array();
        foreach ($pengumuman as $key => $value) {
            $judul[$key] = array(
                'nama' => $value->mahasiswaRole->nama,
                'nim' => $value->mahasiswaRole->nim,
                'jurusan' => $value->mahasiswaRole->jurusan,
                'judul' => JudulModel::where([
                    ['id_mahasiswa', $value->id_mahasiswa],
                    ['detail_tanggal', $detail_tanggal],
                    ['status', 'diterima']
                ])->orwhere([
                    ['id_mahasiswa', $value->id_mahasiswa],
                    ['detail_tanggal', $detail_tanggal],
                    ['status', 'konfirmasi']
                ])->first()
            );
        }

        // return response()->json($judul);
        // Create the mPDF document
        $document = new PDF([
            'mode' => 'utf-8',
            'format' => 'legal',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
            'orientation' => 'L'
        ]);

        $document->WriteHTML(view('Pdf.pdf')->with('data', $judul));
        return $document->Output();
        // return response()->json($data, 200);
    }
}
