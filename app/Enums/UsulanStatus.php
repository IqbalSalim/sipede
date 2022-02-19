<?php

namespace App\Enums;

enum UsulanStatus: string
{
    case Verifikasi = 'verifikasi';
    case Sesuai = 'sesuai';
    case TidakSesuai = 'tidak sesuai';
}
