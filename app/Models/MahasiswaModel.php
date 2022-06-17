<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'id',
        'nama',
        'nim',
        'jurusan',
        'hp',
        'alamat',
        'jk',
        'angkatan',
        'kelas',
        'created_at',
        'updated_at',
    ];
}
