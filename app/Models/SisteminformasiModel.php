<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SisteminformasiModel extends Model
{
    use HasFactory;
    protected $table = "sistem_informasi";
    protected $fillable = [
        'id',
        'tgl_buka',
        'tgl_tutup',
        'sesi',
        'rilis',
        'created_at',
        'updated_at',
    ];

    public function sistemInformasiChild()
    {
        return $this->hasMany(PengajuanModel::class, 'detail_tanggal');
    }
}
