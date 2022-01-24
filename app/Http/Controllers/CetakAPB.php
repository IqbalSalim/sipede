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
use alhimik1986\PhpExcelTemplator\setters\CellSetterArray2DValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;

class CetakAPB extends Controller
{
    public function cetakExcel(Request $request)
    {


        define('SPECIAL_ARRAY_TYPE', CellSetterArrayValueSpecial::class);

        $templateFile = 'templates/template_apbdes.xlsx';
        $fileName = 'exported_APB_Desa.xlsx';

        $spreadsheet = IOFactory::load($templateFile);
        $templateVarsArr = $spreadsheet->setActiveSheetIndexByName('PERDES RANCNG')->toArray();


        $query = Rkpdes::groupBy('kategori')->selectRaw('sum(jumlah) as sum, kategori')->pluck('sum', 'kategori');
        $pembangunan_desa = isset($query['Pembangunan Desa']) ? $query['Pembangunan Desa'] : 0;
        $pemerintah_desa = isset($query['Penyelenggaraan Pemerintahan Desa']) ? $query['Penyelenggaraan Pemerintahan Desa'] : 0;
        $pembinaan_kemasyarakatan = isset($query['Pembinaan Kemasyarakatan']) ? $query['Pembinaan Kemasyarakatan'] : 0;
        $pemberdayaan_masyarakat = isset($query['Pemberdayaan Kemasyarakatan']) ? $query['Pemberdayaan Kemasyarakatan'] : 0;
        $tak_terduga = isset($query['Penanggulangan Bencana, Keadaan Darurat dan Mendesak']) ? $query['Penanggulangan Bencana, Keadaan Darurat dan Mendesak'] : 0;

        $sheet1 = $spreadsheet->setActiveSheetIndexByName('PERDES RANCNG');
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

        $sheet2 = $spreadsheet->setActiveSheetIndexByName('RINGKASN APBDES');
        $templateVarsArr2 = $spreadsheet->setActiveSheetIndexByName('RINGKASN APBDES')->toArray();
        $kegiatanTakTerduga = Rkpdes::where('kategori', '=', 'Penanggulangan Bencana, Keadaan Darurat dan Mendesak')->pluck('kegiatan')->toArray();
        $jumlahTakTerduga = Rkpdes::where('kategori', '=', 'Penanggulangan Bencana, Keadaan Darurat dan Mendesak')->pluck('jumlah')->toArray();
        $jumlahTakTerduga = Rkpdes::where('kategori', '=', 'Penanggulangan Bencana, Keadaan Darurat dan Mendesak')->pluck('jumlah')->toArray();
        $kegiatanPembangunanDesa = Rkpdes::where('kategori', '=', 'Pembangunan Desa')->pluck('kegiatan')->toArray();
        $jumlahPembangunanDesa = Rkpdes::where('kategori', '=', 'Pembangunan Desa')->pluck('jumlah')->toArray();
        $kegiatanPembinaanKemasyarakatan = Rkpdes::where('kategori', '=', 'Pembinaan Kemasyarakatan')->pluck('kegiatan')->toArray();
        $jumlahPembinaanKemasyarakatan = Rkpdes::where('kategori', '=', 'Pembinaan Kemasyarakatan')->pluck('jumlah')->toArray();
        $kegiatanPemberdayaanKemasyarakatan = Rkpdes::where('kategori', '=', 'Pemberdayaan Kemasyarakatan')->pluck('kegiatan')->toArray();
        $jumlahPemberdayaanKemasyarakatan = Rkpdes::where('kategori', '=', 'Pemberdayaan Kemasyarakatan')->pluck('jumlah')->toArray();
        $kegiatanPemerintahDesa = Rkpdes::where('kategori', '=', 'Penyelenggaraan Pemerintahan Desa')->pluck('kegiatan')->toArray();
        $jumlahPemerintahDesa = Rkpdes::where('kategori', '=', 'Penyelenggaraan Pemerintahan Desa')->pluck('jumlah')->toArray();


        PhpExcelTemplator::renderWorksheet($sheet2, $templateVarsArr2, [
            '[kegiatan_tak_terduga]' => new ExcelParam(CellSetterArrayValueSpecial::class, $kegiatanTakTerduga),
            '[jumlah_tak_terduga]' => new ExcelParam(CellSetterArrayValueSpecial::class, $jumlahTakTerduga),
            '[kegiatan_pembangunan_desa]' => new ExcelParam(CellSetterArrayValueSpecial::class, $kegiatanPembangunanDesa),
            '[jumlah_pembangunan_desa]' => new ExcelParam(CellSetterArrayValueSpecial::class, $jumlahPembangunanDesa),
            '[kegiatan_pembinaan_masyarakat]' => new ExcelParam(CellSetterArrayValueSpecial::class, $kegiatanPembinaanKemasyarakatan),
            '[jumlah_pembinaan_masyarakat]' => new ExcelParam(CellSetterArrayValueSpecial::class, $jumlahPembinaanKemasyarakatan),
            '[kegiatan_pemberdayaan_masyarakat]' => new ExcelParam(CellSetterArrayValueSpecial::class, $kegiatanPemberdayaanKemasyarakatan),
            '[jumlah_pemberdayaan_masyarakat]' => new ExcelParam(CellSetterArrayValueSpecial::class, $jumlahPemberdayaanKemasyarakatan),
            '[kegiatan_pemerintah_desa]' => new ExcelParam(CellSetterArrayValueSpecial::class, $kegiatanPemerintahDesa),
            '[jumlah_pemerintah_desa]' => new ExcelParam(CellSetterArrayValueSpecial::class, $jumlahPemerintahDesa),
        ]);

        PhpExcelTemplator::outputSpreadsheetToFile($spreadsheet, $fileName);
    }
}
