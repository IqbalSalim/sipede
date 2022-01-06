<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musrenbang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'filename'
    ];
}
