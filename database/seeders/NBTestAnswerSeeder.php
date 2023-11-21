<?php

namespace Database\Seeders;

use App\Models\NBTestAnswerModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NBTestAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NBTestAnswerModel::create([
            'variant' => '2',
            'correct' => 1,
            'mb_test_question_id' => 1
        ]);
        NBTestAnswerModel::create([
            'variant' => '3',
            'correct' => 0,
            'mb_test_question_id' => 1
        ]);
        NBTestAnswerModel::create([
            'variant' => '4',
            'correct' => 0,
            'mb_test_question_id' => 1
        ]);
        NBTestAnswerModel::create([
            'variant' => '5',
            'correct' => 0,
            'mb_test_question_id' => 1
        ]);

        NBTestAnswerModel::create([
            'variant' => '4',
            'correct' => 1,
            'mb_test_question_id' => 2
        ]);
        NBTestAnswerModel::create([
            'variant' => '5',
            'correct' => 0,
            'mb_test_question_id' => 2
        ]);
        NBTestAnswerModel::create([
            'variant' => '6',
            'correct' => 0,
            'mb_test_question_id' => 2
        ]);
        NBTestAnswerModel::create([
            'variant' => '7',
            'correct' => 0,
            'mb_test_question_id' => 2
        ]);

        NBTestAnswerModel::create([
            'variant' => '6',
            'correct' => 1,
            'mb_test_question_id' => 3
        ]);
        NBTestAnswerModel::create([
            'variant' => '7',
            'correct' => 0,
            'mb_test_question_id' => 3
        ]);
        NBTestAnswerModel::create([
            'variant' => '8',
            'correct' => 0,
            'mb_test_question_id' => 3
        ]);
        NBTestAnswerModel::create([
            'variant' => '9',
            'correct' => 0,
            'mb_test_question_id' => 3
        ]);

        NBTestAnswerModel::create([
            'variant' => '8',
            'correct' => 1,
            'mb_test_question_id' => 4
        ]);
        NBTestAnswerModel::create([
            'variant' => '9',
            'correct' => 0,
            'mb_test_question_id' => 4
        ]);
        NBTestAnswerModel::create([
            'variant' => '10',
            'correct' => 0,
            'mb_test_question_id' => 4
        ]);
        NBTestAnswerModel::create([
            'variant' => '11',
            'correct' => 0,
            'mb_test_question_id' => 4
        ]);

        NBTestAnswerModel::create([
            'variant' => '10',
            'correct' => 1,
            'mb_test_question_id' => 5
        ]);
        NBTestAnswerModel::create([
            'variant' => '11',
            'correct' => 0,
            'mb_test_question_id' => 5
        ]);
        NBTestAnswerModel::create([
            'variant' => '12',
            'correct' => 0,
            'mb_test_question_id' => 5
        ]);
        NBTestAnswerModel::create([
            'variant' => '13',
            'correct' => 0,
            'mb_test_question_id' => 5
        ]);
    }
}
