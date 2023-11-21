<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Domain\FormOfEducations\Models\FormOfEducation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormOfEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('form_of_education')
        //     ->insert([
        //         'title' => 'Bakalavr'
        //     ]);

        // DB::table('form_of_education')
        //     ->insert([
        //         'title' => 'Magistr'
        //     ]);
        FormOfEducation::create([
            'title' => 'Bakalavr'
        ]);

        FormOfEducation::create([
            'title' => 'Magistr'
        ]);   
    }
}
