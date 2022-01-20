<?php

namespace App\Http\Controllers;

use App\Models\Rkpdes;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\params\CallbackParam;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CetakAPB extends Controller
{
    public function cetakExcel(Request $request)
    {

        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);

        $templateFile = 'templates/template_apbdes.xlsx';
        $fileName = 'exported_APB_Desa.xlsx';

        $spreadsheet = IOFactory::load($templateFile);
        $templateVarsArr = $spreadsheet->setActiveSheetIndexByName('Sheet1')->toArray();


        $query = Rkpdes::groupBy('kategori')->selectRaw('sum(jumlah) as sum, kategori')->pluck('sum', 'kategori');
        $pembangunan_desa = isset($query['Pembangunan Desa']) ? $query['Pembangunan Desa'] : 0;
        $pemerintah_desa = isset($query['Penyelenggaraan Pemerintahan Desa']) ? $query['Penyelenggaraan Pemerintahan Desa'] : 0;
        $pembinaan_kemasyarakatan = isset($query['Pembinaan Kemasyarakatan']) ? $query['Pembinaan Kemasyarakatan'] : 0;
        $pemberdayaan_masyarakat = isset($query['Pemberdayaan Kemasyarakatan']) ? $query['Pemberdayaan Kemasyarakatan'] : 0;
        $tak_terduga = isset($query['Penanggulangan Bencana, Keadaan Darurat dan Mendesak']) ? $query['Penanggulangan Bencana, Keadaan Darurat dan Mendesak'] : 0;

        $sheet1 = $spreadsheet->setActiveSheetIndexByName('Sheet1');
        PhpExcelTemplator::renderWorksheet($sheet1, $templateVarsArr, [
            '{pendapatan_desa}' => $request->input('pendapatan_desa'),
            '{penerimaan_pembiayaan}' => $request->input('penerimaan_pembiayaan'),
            '{pengeluaran_pembiayaan}' => $request->input('pengeluaran_pembiayaan'),
            '{pemerintah_desa}' => $pemerintah_desa,
            '{pembangunan_desa}' => $pembangunan_desa,
            '{pembinaan_kemasyarakatan}' => $pembinaan_kemasyarakatan,
            '{pemberdayaan_masyarakat}' => $pemberdayaan_masyarakat,
            '{tak_terduga}' => $tak_terduga,
        ]);

        $sheet2 = $spreadsheet->setActiveSheetIndexByName('Sheet2');
        $templateVarsArr2 = $spreadsheet->setActiveSheetIndexByName('Sheet2')->toArray();
        PhpExcelTemplator::renderWorksheet($sheet2, $templateVarsArr2, [
            '{tanggal}' => '20/9/2020',
        ]);

        PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $fileName);

        // PhpExcelTemplator::outputToFile(public_path('templates/template_apbdes.xlsx'), public_path('exported_APB_Desa.xlsx'), [
        //     '{pendapatan_desa}' => $request->input('pendapatan_desa'),
        //     '{penerimaan_pembiayaan}' => $request->input('penerimaan_pembiayaan'),
        //     '{pengeluaran_pembiayaan}' => $request->input('pengeluaran_pembiayaan'),
        //     '{pemerintah_desa}' => $pemerintah_desa,
        //     '{pembangunan_desa}' => $pembangunan_desa,
        //     '{pembinaan_kemasyarakatan}' => $pembinaan_kemasyarakatan,
        //     '{pemberdayaan_masyarakat}' => $pemberdayaan_masyarakat,
        //     '{tak_terduga}' => $tak_terduga,
        //     '{tanggal}' => '20/9/2020',
        // ]);


        // PhpExcelTemplator::outputToFile(public_path('templates/template_ringkasan_apbdes.xlsx'), public_path('exported_Ringkasan_APB_Desa.xlsx'), [
        //     '{pemerintah_desa}' => 'okeokok',
        // ]);
    }
}
