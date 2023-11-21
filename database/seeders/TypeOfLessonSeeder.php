<?php

namespace Database\Seeders;

use App\Models\TypeOfLessonModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeOfLessonModel::create([
            'type_name'=>'Leksika'
        ]);
        TypeOfLessonModel::create([
            'type_name'=>'Laboratoriya'
        ]);
        TypeOfLessonModel::create([
            'type_name'=>'Amaliyot'
        ]);
    }
}

// 
