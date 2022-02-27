<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use App\Models\Usulan;

class ExportRkpdesaController extends Controller
{
    public function exportRkpdesa(Request $request)
    {
        dd($request->tahun);
    }
}
