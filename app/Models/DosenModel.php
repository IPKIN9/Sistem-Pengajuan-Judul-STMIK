<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;
    protected $table = 'dosen';
    protected $fillable = [
        'id',
        'nama',
        'NIDN',
        'jabatan',
        'created_at',
        'updated_at',
    ];
}
