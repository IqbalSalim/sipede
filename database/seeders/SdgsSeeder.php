<?php

namespace Database\Seeders;

use App\Models\Sdgs;
use Illuminate\Database\Seeder;

class SdgsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load(base_path('/database/sources/sdgs.xlsx'));
        $sheet = $spreadsheet->getSheet($spreadsheet->getFirstSheetIndex());
        $data = $sheet->toArray();
        $data1 = [];
        foreach ($data as $key => $value) {
            array_push($data1, $value);
        }

        foreach ($data1 as $row) {
            Sdgs::create([
                'id' => $row[0],
                'keterangan' => $row[1],
            ]);
        }
    }
}
