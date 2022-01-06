<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rkpdes extends Model
{
    use HasFactory;
    protected $table = 'rkpdes';
    protected $fillable = [
        'kategori',
        'kegiatan',
        'lokasi',
        'sdgs',
        'volume',
        'satuan',
        'sasaran',
        'waktu',
        'jumlah',
        'sumber',
        'kode_rekening',
        'pola',
        'rencana',
    ];
}
