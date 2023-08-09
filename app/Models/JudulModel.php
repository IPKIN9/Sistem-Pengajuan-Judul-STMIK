<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JudulModel extends Model
{
    use HasFactory;
    protected $table = "judul";
    protected $fillable = [
        'id',
        'id_mahasiswa',
        'detail_tanggal',
        'nama_judul',
        'descJudul',
        'status',
        'jurnal',
        'created_at',
        'updated_at',
    ];

    public function mahasiswaRole()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa');
    }
    public function detailTanggalRole()
    {
        return $this->belongsTo(SisteminformasiModel::class, 'detail_tanggal');
    }
}
