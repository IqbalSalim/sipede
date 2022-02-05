<?php

namespace Database\Seeders;

use App\Models\Subbidang;
use Illuminate\Database\Seeder;

class SubbidangSeeder extends Seeder
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
                'bidang_id' => '1',
                'kd_rek' => '1',
                'nama' => 'Sub Bidang Penyelenggaraan Belanja Penghasilan Tetap, Tunjangan dan Operasional Pemerintah Desa',
            ],
            [
                'bidang_id' => '1',
                'kd_rek' => '2',
                'nama' => 'Sub Bidang Sarana dan Prasarana Pemerintah Desa',
            ],
            [
                'bidang_id' => '1',
                'kd_rek' => '3',
                'nama' => 'Sub Bidang Administrasi Kependudukan, Pencatatan Sipil, Statistik dan Kearsipan',
            ],
            [
                'bidang_id' => '1',
                'kd_rek' => '4',
                'nama' => 'Sub Bidang Tata Pemerintahan, Perencanaan, Keuangan dan Pelaporan',
            ],
            [
                'bidang_id' => '1',
                'kd_rek' => '5',
                'nama' => 'Sub Bidang Pertanahan',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '1',
                'nama' => 'Sub Bidang Pendidikan',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '2',
                'nama' => 'Sub Bidang Kesehatan',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '3',
                'nama' => 'Sub Bidang Pekerjaan Umum dan Penataan Ruang',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '4',
                'nama' => 'Sub Bidang Kawasan Pemukiman',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '5',
                'nama' => 'Sub Bidang Kehutanan dan Lingkungan Hidup',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '6',
                'nama' => 'Sub Bidang Perhubungan, Komunikasi dan Informatika',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '7',
                'nama' => 'Sub Bidang Energi dan Sumber Daya Mineral',
            ],
            [
                'bidang_id' => '2',
                'kd_rek' => '8',
                'nama' => 'Sub Bidang Pariwisata',
            ],
            [
                'bidang_id' => '3',
                'kd_rek' => '1',
                'nama' => 'Sub Bidang Ketenteraman, Ketertiban Umum, dan Pelindungan Masyarakat',
            ],
            [
                'bidang_id' => '3',
                'kd_rek' => '2',
                'nama' => 'Sub Bidang Kebudayaan dan Keagamaan',
            ],
            [
                'bidang_id' => '3',
                'kd_rek' => '3',
                'nama' => 'Sub Bidang Kepemudaan dan Olah Raga',
            ],
            [
                'bidang_id' => '3',
                'kd_rek' => '4',
                'nama' => 'Sub Bidang Kelembagaan Masyarakat',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '1',
                'nama' => 'Sub Bidang Kelautan dan Perikanan',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '2',
                'nama' => 'Sub Bidang Pertanian dan Peternakan',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '3',
                'nama' => 'Sub Bidang Peningkatan Kapasitas Aparatur Desa',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '4',
                'nama' => 'Sub Bidang Pemberdayaan Perempuan, Perlindungan Anak dan Keluarga',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '5',
                'nama' => 'Sub Bidang Koperasi, Usaha Mikro Kecil dan Menengah (UMKM)',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '6',
                'nama' => 'Sub Bidang Dukungan Penanaman Modal',
            ],
            [
                'bidang_id' => '4',
                'kd_rek' => '7',
                'nama' => 'Sub Bidang Perdagangan dan Perindustrian',
            ],
            [
                'bidang_id' => '5',
                'kd_rek' => '1',
                'nama' => 'Sub Bidang Penanggulangan Bencana',
            ],
            [
                'bidang_id' => '5',
                'kd_rek' => '2',
                'nama' => 'Sub Bidang Keadaan Darurat',
            ],
            [
                'bidang_id' => '5',
                'kd_rek' => '3',
                'nama' => 'Sub Bidang Keadaan Mendesak',
            ],

        ];

        foreach ($array as $row) {
            Subbidang::create([
                'bidang_id' => $row['bidang_id'],
                'kd_rek' => $row['kd_rek'],
                'nama' => $row['nama'],
            ]);
        }
    }
}
