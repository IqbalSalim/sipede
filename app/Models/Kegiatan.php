<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'subbidang_id',
        'kd_rek',
        'nama',
        'lokasi',
        'sdgs',
        'volume',
        'satuan',
        'waktu',
        'jumlah',
        'sumber',
        'pola',
        'rencana',
    ];

    public function subbidang()
    {
        return $this->belongsTo(Subbidang::class, 'subbidang_id');
    }
}
