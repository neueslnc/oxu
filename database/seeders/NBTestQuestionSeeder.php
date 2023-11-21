<?php

namespace Database\Seeders;

use App\Models\NBTestQuestionModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NBTestQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NBTestQuestionModel::create([
            'question' => '1 + 1 = ?',
            'type' => 'variant',
            'waiting_seconds' => 30,
            'mb_test_theme_id' => 1,
        ]);
        NBTestQuestionModel::create([
            'question' => '2 + 2 = ?',
            'type' => 'variant',
            'waiting_seconds' => 30,
            'mb_test_theme_id' => 1,
        ]);
        NBTestQuestionModel::create([
            'question' => '3 + 3 = ?',
            'type' => 'variant',
            'waiting_seconds' => 30,
            'mb_test_theme_id' => 1,
        ]);
        NBTestQuestionModel::create([
            'question' => '4 + 4 = ?',
            'type' => 'variant',
            'waiting_seconds' => 30,
            'mb_test_theme_id' => 1,
        ]);
        NBTestQuestionModel::create([
            'question' => '5 + 5 = ?',
            'type' => 'variant',
            'waiting_seconds' => 30,
            'mb_test_theme_id' => 1,
        ]);
    }
}
