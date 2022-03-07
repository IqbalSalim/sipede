<?php

namespace App\Models;

use App\Enums\UsulanStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usulan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kegiatan_id',
        'tahun',
        'status',
        'lokasi',
        'sdgs',
        'volume',
        'satuan',
        'sasaran',
        'waktu',
        'jumlah',
        'sumber',
        'pola',
        'rencana',
        'keterangan',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function scopeCariBidang($query, $bidang_id)
    {
        if ($bidang_id == null || $bidang_id == '') {
            return $query->orWhereHas('kegiatan', function ($query) use ($bidang_id) {
                $query->whereHas('subbidang', function ($q) use ($bidang_id) {
                    $q->where('bidang_id', $bidang_id);
                });
            });
        }
        return $query->WhereHas('kegiatan', function ($query) use ($bidang_id) {
            $query->whereHas('subbidang', function ($q) use ($bidang_id) {
                $q->where('bidang_id', $bidang_id);
            });
        });
    }

    public function scopeCariKegiatan($query, $nama)
    {
        // if ($nama == null || $nama == '') {
        //     return $query->orWhereHas('kegiatan', function ($q) use ($nama) {
        //         $q->where('nama', 'like', '%' . $nama . '%');
        //     });
        // }

        return $query->whereHas('kegiatan', function ($q) use ($nama) {
            $q->where('nama', 'like', '%' . $nama . '%');
        });
    }
}
