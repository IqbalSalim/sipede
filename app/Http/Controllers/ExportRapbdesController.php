<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use App\Models\Pendapatan;
use App\Models\Usulan;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExportRapbdesController extends Controller
{
    public function exportRapbdes(Request $request)
    {

        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);
        $templateFile = 'templates/template_rapbdes.xlsx';
        $fileName = 'exported_RAPB_Desa.xlsx';

        $spreadsheet = IOFactory::load($templateFile);

        $templateVarsArr = $spreadsheet->setActiveSheetIndexByName('LAMPIRAN OK')->toArray();
        $sheet2 = $spreadsheet->setActiveSheetIndexByName('LAMPIRAN OK');




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
                    array_push($rapbdes['sumber_' . $i], $row->sumber);
                }
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $rapbdes['2a_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rapbdes['2a_' . $i]);
            $rapbdes['2b_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rapbdes['2b_' . $i]);
            $rapbdes['uraian_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rapbdes['uraian_' . $i]);
            $rapbdes['anggaran_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rapbdes['anggaran_' . $i]);
            $rapbdes['sumber_' . $i] = new ExcelParam(SPECIAL_ARRAY_TYPE, $rapbdes['sumber_' . $i]);
        }

        PhpExcelTemplator::renderWorksheet($sheet2, $templateVarsArr, $rapbdes);

        PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $fileName);
    }
}
