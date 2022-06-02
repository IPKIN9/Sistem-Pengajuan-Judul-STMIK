<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengajuanModel extends Model
{
    use HasFactory;
    protected $table = "pengajuan";
    protected $fillable = [
        'id',
        'id_mahasiswa',
        'id_judul',
        'status',
        'ck1',
        'ck2',
        'ck3',
        'created_at',
        'updated_at',
    ];
    public function mahasiswa(): HasMany
    {
        return $this->hasMany(MahasiswaModel::class, 'id_mahasiswa', 'id');
    }
    public function judul(): HasMany
    {
        return $this->hasMany(JudulModel::class, 'id_judul', 'id');
    }
}
