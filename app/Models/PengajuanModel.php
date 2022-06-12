<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanModel extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $fillable = [
        'id',
        'id_mahasiswa',
        'id_judul',
        'status',
        'detail_tanggal',
        'created_at',
        'updated_at',
    ];
    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa');
    }
    public function judul()
    {
        return $this->belongsTo(JudulModel::class, 'id_judul');
    }
    public function detailTanggal()
    {
        return $this->belongsTo(SisteminformasiModel::class, 'detail_tanggal');
    }
}
