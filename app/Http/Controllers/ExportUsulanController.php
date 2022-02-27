<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use App\Models\Usulan;

class ExportUsulanController extends Controller
{
    public function exportUsulan(Request $request)
    {
        // dd($request->tahun);

        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $rekap = [];
        // dd($rekap);
        $query = Usulan::where('tahun', $request->tahun)->cariBidang($request->bidang)->get();
        // dd($query);
        for ($i = 1; $i <= 5; $i++) {
            $no = 1;
            $rekap['no_' . $i] = [];
            $rekap['kegiatan_' . $i] = [];
            $rekap['lokasi_' . $i] = [];
            $rekap['sdgs_' . $i] = [];
            $rekap['volume_' . $i] = [];
            $rekap['satuan_' . $i] = [];
            foreach ($query as $row) {
                if ($row->kegiatan->subbidang->bidang_id == $i) {
                    array_push($rekap['no_' . $i], $no);
                    array_push($rekap['kegiatan_' . $i], $row->kegiatan->nama);
                    array_push($rekap['lokasi_' . $i], $row->lokasi);
                    array_push($rekap['sdgs_' . $i], $row->sdgs);
                    array_push($rekap['volume_' . $i], $row->volume);
                    array_push($rekap['satuan_' . $i], $row->satuan);
                }
                $no++;
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            $rekap['no_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['no_' . $i]);
            $rekap['kegiatan_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['kegiatan_' . $i]);
            $rekap['lokasi_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['lokasi_' . $i]);
            $rekap['sdgs_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['sdgs_' . $i]);
            $rekap['volume_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['volume_' . $i]);
            $rekap['satuan_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rekap['satuan_' . $i]);
        }

        return PhpExcelTemplator::outputToFile(public_path('templates/template_usulan.xlsx'), public_path('usulan_exported.xlsx'), $rekap);
    }
}
