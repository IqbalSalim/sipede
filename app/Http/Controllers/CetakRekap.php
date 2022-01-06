<?php

namespace App\Http\Controllers;

use App\Models\Rkpdes;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use Illuminate\Http\Request;

class CetakRekap extends Controller
{
    public function cetakExel()
    {
        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $rekap = [
            'no' => [],
            'kategori' => [],
            'kegiatan' => [],
            'lokasi' => [],
            'sdgs' => [],
            'volume' => [],
            'satuan' => [],
        ];
        $query = Rkpdes::all()->sortBy('kategori')->toArray();
        // dd($query);
        $no = 0;
        foreach ($query as $key => $value) {
            array_push($rekap['no'], $no + 1);
            array_push($rekap['kegiatan'], $value['kegiatan']);
            array_push($rekap['lokasi'], $value['lokasi']);
            array_push($rekap['sdgs'], $value['sdgs']);
            array_push($rekap['volume'], $value['volume']);
            array_push($rekap['satuan'], $value['satuan']);
            array_push($rekap['kategori'], $value['kategori']);
            $no = $no + 1;
        }
        // dd($rekap);
        return PhpExcelTemplator::outputToFile(public_path('templates/template_rekapan.xlsx'), public_path('exported_file.xlsx'), [
            '[no]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['no']),
            '[kegiatan]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['kegiatan']),
            '[lokasi]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['lokasi']),
            '[sdgs]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['sdgs']),
            '[volume]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['volume']),
            '[satuan]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['satuan']),
            '[kategori]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['kategori']),
        ]);
    }
}
