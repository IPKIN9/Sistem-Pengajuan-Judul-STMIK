<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JurnalModel extends Model
{
    use HasFactory;
    protected $table = "jurnal";
    protected $fillable = [
        'id',
        'id_judul',
        'nama_jurnal',
        'sumber',
        'descJurnal',
        'ISSN',
        'tahunterbit',
        'path_file',
        'created_at',
        'updated_at',
    ];
    public function judul(): HasMany
    {
        return $this->hasMany(JudulModel::class, 'id_judul', 'id');
    }
}
