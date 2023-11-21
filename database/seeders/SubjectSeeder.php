<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Subject::create(['name' => "Fizika", "departament_id" => 1]);
        \App\Models\Subject::create(['name' => "Ximiyo", "departament_id" => 2]);
        \App\Models\Subject::create(['name' => "Matematika", "departament_id" => 2]);
    }
}
