<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Seeder Mahasiswa
        DB::table('users')->insert([
            [
                'name'=> 'darto',
                'username' => 'mahasiswa1',
                'password' => Hash::make('password123'),
                'email' => 'mahasiswa1@example.com',
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'darto2',
                'username' => 'mahasiswa2',
                'password' => Hash::make('password123'),
                'email' => 'mahasiswa2@example.com',
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'darto3',
                'username' => 'mahasiswa3',
                'password' => Hash::make('password123'),
                'email' => 'mahasiswa3@example.com',
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'darto4',
                'username' => 'mahasiswa4',
                'password' => Hash::make('password123'),
                'email' => 'mahasiswa4@example.com',
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'darto5',
                'username' => 'mahasiswa5',
                'password' => Hash::make('password123'),
                'email' => 'mahasiswa5@example.com',
                'role' => 'mahasiswa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder Dosen
        DB::table('users')->insert([
            [
                'name'=> 'Rahmat1 S.Kom, M.kom',
                'username' => 'dosen1',
                'password' => Hash::make('password123'),
                'email' => 'dosen1@example.com',
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Rahmat2 S.Kom, M.kom',
                'username' => 'dosen2',
                'password' => Hash::make('password123'),
                'email' => 'dosen2@example.com',
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Rahmat3 S.Kom, M.kom',
                'username' => 'dosen3',
                'password' => Hash::make('password123'),
                'email' => 'dosen3@example.com',
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Rahmat4 S.Kom, M.kom',
                'username' => 'dosen4',
                'password' => Hash::make('password123'),
                'email' => 'dosen4@example.com',
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'=> 'Rahmat5 S.Kom, M.kom',
                'username' => 'dosen5',
                'password' => Hash::make('password123'),
                'email' => 'dosen5@example.com',
                'role' => 'dosen',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
