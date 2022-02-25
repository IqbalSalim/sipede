<?php

namespace Database\Seeders;

use App\Models\KategoriPendapatan;
use Illuminate\Database\Seeder;

class KategoriPendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => 'Pendapatan Asli Desa',
                'kd_rek' => '41',
            ],
            [
                'name' => 'Pendapatan Transfer',
                'kd_rek' => '42',
            ],
            [
                'name' => 'Pendapatan Lain-lain',
                'kd_rek' => '43',
            ],

        ];
        foreach ($array as $row) {
            KategoriPendapatan::create([
                'kategori' => $row['name'],
                'kd_rek' => $row['kd_rek'],
            ]);
        }
    }
}
