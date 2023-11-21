<?php

namespace Database\Seeders;

use App\Models\ControlTypeExam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ControlTypeExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ControlTypeExam::create(['name' => 'Yakuniy nazorat']);
        ControlTypeExam::create(['name' => 'Umumiy']);

    }
}
