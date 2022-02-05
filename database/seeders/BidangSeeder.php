<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Bidang Penyelenggaraan Pemerintahan Desa',
            'Bidang Pelaksanaan Pembangunan Desa',
            'Bidang Pembinaan Kemasyarakatan Desa',
            'Bidang Pemberdayaan Masyarakat Desa',
            'Bidang Penanggulangan Bencana, Keadaan Darurat dan Mendesak',
        ];

        foreach ($array as $row) {
            Bidang::create([
                'nama' => $row,
            ]);
        }
    }
}
