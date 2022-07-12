<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\JudulModel;
use App\Models\MahasiswaModel;
use App\Models\PengajuanModel;
use \Mpdf\Mpdf as PDF;

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
                    'judul' => $pengumuman->where('id_mahasiswa', $value->id)->select(array('nama_judul', 'status'))->first(),
                ),
            );
        }
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

        $document->WriteHTML(view('Pdf.pdf')->with('data', $data));
        return $document->Output();
        // return response()->json($data, 200);
    }
}
