<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => 'password',
                'role' => 'admin',
            ],
            [
                'name' => 'Kepala Desa',
                'email' => 'kades@gmail.com',
                'password' => 'password',
                'role' => 'kepala desa',
            ],
            [
                'name' => 'Sekretaris Desa',
                'email' => 'sekretaris@gmail.com',
                'password' => 'password',
                'role' => 'sekretaris',
            ],
            [
                'name' => 'Tim Penyusun',
                'email' => 'timpenyusun@gmail.com',
                'password' => 'password',
                'role' => 'tim penyusun',
            ],
        ];

        foreach ($users as $row) {
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);

            $role = Role::where('name', $row['role'])->first();
            $user = User::where('email', $row['email'])->first();
            $user->assignRole($role);
        }
    }
}
