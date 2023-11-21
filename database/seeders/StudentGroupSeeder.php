<?php

namespace Database\Seeders;

use App\Models\StudentGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentGroup::create(['name' => "SM-23"]);
        StudentGroup::create(['name' => "SM-22"]);
        StudentGroup::create(['name' => "Sm-21"]);
    }
}
