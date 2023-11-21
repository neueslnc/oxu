<?php

namespace Database\Seeders;

use App\Models\DepartamentModel;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepartamentModel::create(['name' => "Kafedra - 1"]);
        DepartamentModel::create(['name' => "Kafedra - 2"]);
    }
}
