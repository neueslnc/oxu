<?php

namespace Database\Seeders;

use App\Models\NBTestThemeModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NBTestThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NBTestThemeModel::create([
            'theme_id' => 1,
            'user_id' => 4,
            'subject_id' => 1
        ]);
    }
}
