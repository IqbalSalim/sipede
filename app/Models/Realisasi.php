<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'usulan_id',
        'uraian',
        'harga'
    ];

    public function usulan()
    {
        return $this->belongsTo(Usulan::class, 'usulan_id');
    }

    public function scopeWhereTahun($query, $tahun)
    {
        return $query->whereHas('usulan', function ($query) use ($tahun) {
            $query->where('tahun', $tahun);
        });
    }
}
