<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('courses')->insert([
            [
                'course_name' => 'Matematika Dasar',
                'course_code' => 'MAT101',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_name' => 'Pemrograman Web',
                'course_code' => 'WEB201',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_name' => 'Sistem Operasi',
                'course_code' => 'SO301',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_name' => 'Jaringan Komputer',
                'course_code' => 'NET401',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_name' => 'Basis Data',
                'course_code' => 'DB501',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
