<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Semester::create(['name' => 'semester-1']);
        \App\Models\Semester::create(['name' => 'semester-2']);
        \App\Models\Semester::create(['name' => 'semester-3']);
        \App\Models\Semester::create(['name' => 'semester-4']);
        \App\Models\Semester::create(['name' => 'semester-5']);
        \App\Models\Semester::create(['name' => 'semester-6']);
        \App\Models\Semester::create(['name' => 'semester-7']);
        \App\Models\Semester::create(['name' => 'semester-8']);
    }
}
