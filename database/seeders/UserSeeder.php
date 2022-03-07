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
                'password' => '12345678',
                'role' => '1',
            ],
            [
                'name' => 'Kepala Desa',
                'email' => 'kades@gmail.com',
                'password' => '12345678',
                'role' => '2',
            ],
            [
                'name' => 'Sekretaris Desa',
                'email' => 'sekretaris@gmail.com',
                'password' => '12345678',
                'role' => '3',
            ],
            [
                'name' => 'Tim Penyusun',
                'email' => 'timpenyusun@gmail.com',
                'password' => '12345678',
                'role' => '4',
            ],
        ];

        foreach ($users as $row) {
            User::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
            ]);

            $user = User::where('email', $row['email'])->first();
            $user->assignRole($row['role']);
        }

        $permission = Permission::create(['name' => 'crud usulan']);
        $role = Role::where('name', 'sekretaris')->first();
        $permission = Permission::where('name', 'crud usulan')->first();
        $permission->assignRole($role);
    }
}
