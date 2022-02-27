<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'uraian',
        'anggaran',
        'sumber_dana',
        'tahun',
    ];

    public function kategoriPendapatan()
    {
        return $this->belongsTo(KategoriPendapatan::class, 'kategori_id');
    }
}
