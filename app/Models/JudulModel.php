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
        'nama_judul',
        'descJudul',
        'created_at',
        'updated_at',
    ];

    public function mahasiswaRole()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id_mahasiswa');
    }
}
