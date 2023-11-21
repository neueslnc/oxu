<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UserLevel::create(['name' => "super_admin", "level" => 1]);
        \App\Models\UserLevel::create(['name' => "admin", "level" => 2]);
        \App\Models\UserLevel::create(['name' => "teacher", "level" => 3]);
        \App\Models\UserLevel::create(['name' => "student", "level" => 4]);
        \App\Models\UserLevel::create(['name' => "supervisor", "level" => 5]);
        \App\Models\UserLevel::create(['name' => "dean", "level" => 6]);
        \App\Models\UserLevel::create(['name' => "supervisor_exams", "level" => 7]);
        \App\Models\UserLevel::create(['name' => "rektor", "level" => 8]);
        \App\Models\UserLevel::create(['name' => "booker", "level" => 9]);
        \App\Models\UserLevel::create(['name' => "nb_controller", "level" => 10]);
    }
}
