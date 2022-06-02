<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function mahasiswa(): HasMany
    {
        return $this->hasMany(MahasiswaModel::class, 'id_mahasiswa', 'id');
    }
}
