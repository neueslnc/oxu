<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_courses')
            ->insert([
                'title' => '1'
            ]);

        DB::table('student_courses')
            ->insert([
                'title' => '2'
            ]);

        DB::table('student_courses')
            ->insert([
                'title' => '3'
            ]);

        DB::table('student_courses')
            ->insert([
                'title' => '4'
            ]);

        DB::table('student_courses')
            ->insert([
                'title' => '5'
            ]);
    }
}
