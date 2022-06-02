<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkripsiModel extends Model
{
    use HasFactory;
    protected $table = "skripsi";
    protected $fillable = [
        'id',
        'nama_judul',
        'peneliti',
        'tempat_penelitian',
        'abstrak',
        'pembimbing1',
        'pembimbing2',
        'tgl_terbit',
        'created_at',
        'updated_at',
    ];
}
