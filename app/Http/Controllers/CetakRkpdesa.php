<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rkpdes;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;

class CetakRkpdesa extends Controller
{
    public function cetakExcel()
    {
        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $rekap = [
            'no' => [],
            'kode_rekening' => [],
            'bidang' => [],
            'kegiatan' => [],
            'lokasi' => [],
            'volume' => [],
            'sasaran' => [],
            'waktu' => [],
            'jumlah' => [],
            'sumber' => [],
            'pola' => [],
            'rencana' => [],
        ];
        $query = Rkpdes::all()->sortBy('kategori')->toArray();
        // dd($query);
        $no = 0;
        foreach ($query as $key => $value) {
            array_push($rekap['no'], $no + 1);
            array_push($rekap['kode_rekening'], $value['kode_rekening']);
            array_push($rekap['bidang'], $value['kategori']);
            array_push($rekap['kegiatan'], $value['kegiatan']);
            array_push($rekap['lokasi'], $value['lokasi']);
            array_push($rekap['volume'], $value['volume'] . ' ' . $value['satuan']);
            array_push($rekap['sasaran'], $value['sasaran']);
            array_push($rekap['waktu'], $value['waktu']);
            array_push($rekap['jumlah'], $value['jumlah']);
            array_push($rekap['sumber'], $value['sumber']);
            array_push($rekap['pola'], $value['pola']);
            array_push($rekap['rencana'], $value['rencana']);
            $no = $no + 1;
        }
        // dd($rekap);
        return PhpExcelTemplator::outputToFile(public_path('templates/template_rkpdesa.xlsx'), public_path('exported_file.xlsx'), [
            '[no]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['no']),
            '[kode_rekening]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['kode_rekening']),
            '[bidang]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['bidang']),
            '[kegiatan]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['kegiatan']),
            '[lokasi]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['lokasi']),
            '[volume]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['volume']),
            '[sasaran]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['sasaran']),
            '[waktu]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['waktu']),
            '[jumlah]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['jumlah']),
            '[sumber]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['sumber']),
            '[pola]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['pola']),
            '[rencana]' => new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['rencana']),
        ]);
    }
}
