<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BidangSeeder::class);
        $this->call(SubbidangSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(KategoriPendapatanSeeder::class);
        $this->call(SdgsSeeder::class);
    }
}
