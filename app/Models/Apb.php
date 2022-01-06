<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'filename'
    ];
}
