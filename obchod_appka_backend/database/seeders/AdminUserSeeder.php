<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'meno' => 'Admin',
            'priezvisko' => 'Účet',
            'email' => 'admin@example.com',
            'telefon' => '0900000000',
            'password' => Hash::make('admin123'),
            'krajina' => 'Slovensko',
            'mesto' => 'Bratislava',
            'ulica' => 'Hlavná 1',
            'PSC' => '81101',
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'meno' => 'test',
            'priezvisko' => 'test',
            'email' => 'test@test.test',
            'telefon' => '0900000000',
            'password' => Hash::make('test'),
            'krajina' => 'Slovensko',
            'mesto' => 'Bratislava',
            'ulica' => 'Hlavná 1',
            'PSC' => '81101',
            'admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
