<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use App\Models\Kegiatan;
use App\Models\Pendapatan;
use App\Models\Subbidang;
use App\Models\Usulan;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportRapbdesController extends Controller
{
    public function exportRapbdes(Request $request)
    {

        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValue::class);

        $templateFile = 'templates/template_rapbdes.xlsx';
        $fileName = 'exported_RAPB_Desa.xlsx';

        $spreadsheet = IOFactory::load($templateFile);

        $pendapatan = Pendapatan::where('tahun', $request->tahun)->sum('anggaran');
        $belanja = Usulan::where('tahun', $request->tahun)->where('status', 'sesuai')->sum('jumlah');

        $shetArr1 = $spreadsheet->setActiveSheetIndex(0)->toArray();
        $sheet1 = $spreadsheet->setActiveSheetIndex(0);
        PhpExcelTemplator::renderWorksheet($sheet1, $shetArr1, [
            '{pendapatan}' => $pendapatan,
            '{belanja}' => $belanja,
        ]);

        // Sheet 2
        $rapbdes = [];
        $query = Pendapatan::where('tahun', $request->tahun)->get();


        for ($i = 1; $i <= 3; $i++) {

            $rapbdes['2a_' . $i] = [];
            $rapbdes['2b_' . $i] = [];
            $rapbdes['uraian_' . $i] = [];
            $rapbdes['anggaran_' . $i] = [];
            $rapbdes['sumber_' . $i] = [];

            foreach ($query as $row) {
                if ($row->kategoriPendapatan->id == $i) {
                    array_push($rapbdes['2a_' . $i], str_split($row->kategoriPendapatan->kd_rek)[0]);
                    array_push($rapbdes['2b_' . $i], str_split($row->kategoriPendapatan->kd_rek)[1]);
                    array_push($rapbdes['uraian_' . $i], $row->uraian);
                    array_push($rapbdes['anggaran_' . $i], $row->anggaran);
                    array_push($rapbdes['sumber_' . $i], $row->sumber_dana);
                }
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $rapbdes['2a_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['2a_' . $i]);
            $rapbdes['2b_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['2b_' . $i]);
            $rapbdes['uraian_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['uraian_' . $i]);
            $rapbdes['anggaran_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['anggaran_' . $i]);
            $rapbdes['sumber_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['sumber_' . $i]);
        }

        $que = Usulan::with('kegiatan')->where('tahun', $request->tahun)->where('status', 'sesuai')
            ->orderBy(Kegiatan::with('subbidang')->select('kd_rek')->whereColumn('kegiatans.id', 'usulans.kegiatan_id')->orderBy(Subbidang::select('kd_rek')->whereColumn('subbidangs.id', 'kegiatans.subbidang_id')))->get();

        for ($i = 1; $i <= 5; $i++) {

            $rapbdes['1a_' . $i] = [];
            $rapbdes['1b_' . $i] = [];
            $rapbdes['1c_' . $i] = [];
            $rapbdes['b_uraian_' . $i] = [];
            $rapbdes['b_anggaran_' . $i] = [];
            $rapbdes['b_sumber_' . $i] = [];

            foreach ($que as $row) {
                if ($row->kegiatan->subbidang->bidang_id == $i) {
                    array_push($rapbdes['1a_' . $i], $row->kegiatan->subbidang->bidang_id);
                    array_push($rapbdes['1b_' . $i], $row->kegiatan->subbidang->kd_rek);
                    array_push($rapbdes['1c_' . $i], $row->kegiatan->kd_rek);
                    array_push($rapbdes['b_uraian_' . $i], $row->kegiatan->nama);
                    array_push($rapbdes['b_anggaran_' . $i], $row->jumlah);
                    array_push($rapbdes['b_sumber_' . $i], $row->sumber);
                }
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $rapbdes['1a_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['1a_' . $i]);
            $rapbdes['1b_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['1b_' . $i]);
            $rapbdes['1c_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['1c_' . $i]);
            $rapbdes['b_uraian_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['b_uraian_' . $i]);
            $rapbdes['b_anggaran_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['b_anggaran_' . $i]);
            $rapbdes['b_sumber_' . $i] = new ExcelParam(CellSetterArrayValueSpecial::class, $rapbdes['b_sumber_' . $i]);
        }


        $shetArr2 = $spreadsheet->setActiveSheetIndex(1)->toArray();
        $sheet2 = $spreadsheet->setActiveSheetIndex(1);
        PhpExcelTemplator::renderWorksheet($sheet2, $shetArr2, $rapbdes);



        // dd($sheet2);


        PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $fileName);
    }
}
