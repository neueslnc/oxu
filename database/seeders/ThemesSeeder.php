<?php

namespace Database\Seeders;

use App\Models\ThemeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThemeModel::create([
            'theme_name' => 'test',
            'subject_id' => 1,
            'theme_text' => 'test',
            'teacher_id' => 4,
            'semester_id' => 1,
            'direction_id' => 1
        ]);
    }
}
