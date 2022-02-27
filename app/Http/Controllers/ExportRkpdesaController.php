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
        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $rkp = [];
        $query = Usulan::where('tahun', $request->tahun)->where('status', 'sesuai')->get();
        for ($i = 1; $i <= 5; $i++) {
            $no = 1;
            $rkp['a_' . $i] = [];
            $rkp['b_' . $i] = [];
            $rkp['c_' . $i] = [];
            $rkp['no_' . $i] = [];
            $rkp['kegiatan_' . $i] = [];
            $rkp['lokasi_' . $i] = [];
            $rkp['volume_' . $i] = [];
            $rkp['sasaran_' . $i] = [];
            $rkp['waktu_' . $i] = [];
            $rkp['jumlah_' . $i] = [];
            $rkp['sumber_' . $i] = [];
            $rkp['pola_' . $i] = [];
            $rkp['rencana_' . $i] = [];
            foreach ($query as $row) {
                if ($row->kegiatan->subbidang->bidang_id == $i) {
                    array_push($rkp['a_' . $i], $row->kegiatan->subbidang->bidang_id);
                    array_push($rkp['b_' . $i], $row->kegiatan->subbidang->kd_rek);
                    array_push($rkp['c_' . $i], $row->kegiatan->kd_rek);
                    array_push($rkp['no_' . $i], $no);
                    array_push($rkp['kegiatan_' . $i], $row->kegiatan->nama);
                    array_push($rkp['lokasi_' . $i], $row->lokasi);
                    array_push($rkp['volume_' . $i], $row->volume . ' ' . $row->satuan);
                    array_push($rkp['sasaran_' . $i], $row->sasaran);
                    array_push($rkp['waktu_' . $i], $row->waktu);
                    array_push($rkp['jumlah_' . $i], $row->jumlah);
                    array_push($rkp['sumber_' . $i], $row->sumber);
                    array_push($rkp['pola_' . $i], $row->pola);
                    array_push($rkp['rencana_' . $i], $row->rencana);
                    $no++;
                }
            }
        }

        for ($i = 1; $i <= 5; $i++) {
            $rkp['a_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['a_' . $i]);
            $rkp['b_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['b_' . $i]);
            $rkp['c_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['c_' . $i]);
            $rkp['no_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['no_' . $i]);
            $rkp['kegiatan_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['kegiatan_' . $i]);
            $rkp['lokasi_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['lokasi_' . $i]);
            $rkp['volume_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['volume_' . $i]);
            $rkp['sasaran_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['sasaran_' . $i]);
            $rkp['waktu_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['waktu_' . $i]);
            $rkp['jumlah_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['jumlah_' . $i]);
            $rkp['sumber_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['sumber_' . $i]);
            $rkp['pola_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['pola_' . $i]);
            $rkp['rencana_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rkp['rencana_' . $i]);
        }
        $rkp['{tahun}'] = $request->tahun;

        return PhpExcelTemplator::outputToFile(public_path('templates/template_rkpdesa.xlsx'), public_path('rkpdesa_exported.xlsx'), $rkp);
    }
}
