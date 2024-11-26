<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenCoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('dosen_courses')->insert([
            [
                'dosen_id' => 6, // ID dosen1
                'course_id' => 1,  // Matematika Dasar
                'created_at' => now(),
            ],
            [
                'dosen_id' => 7, // ID dosen2
                'course_id' => 2,  // Pemrograman Web
                'created_at' => now(),
            ],
            [
                'dosen_id' => 8, // ID dosen3
                'course_id' => 3,  // Sistem Operasi
                'created_at' => now(),
            ],
            [
                'dosen_id' => 9, // ID dosen4
                'course_id' => 4,  // Jaringan Komputer
                'created_at' => now(),
            ],
            [
                'dosen_id' => 10, // ID dosen5
                'course_id' => 5,  // Basis Data
                'created_at' => now(),
            ],
        ]);
    }
}
