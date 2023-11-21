<?php

namespace Database\Seeders;

use App\Models\TypeOfEducationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfEducationModel::create([
            'name'=>'Kunduzgi'
        ]);
        TypeOfEducationModel::create([
            'name'=>'Sirtqi'
        ]);

    }
}
