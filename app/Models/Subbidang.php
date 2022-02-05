<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbidang extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang_id',
        'kd_rek',
        'nama',
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
