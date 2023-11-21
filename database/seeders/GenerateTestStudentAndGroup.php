<?php

namespace Database\Seeders;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class GenerateTestStudentAndGroup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mas = [
            [
                "login" => "vadim",
                "full_name" => "Vadim Dibcev Lochinovich"
            ],
            [
                "login" => "karim",
                "full_name" => "Mirzayev Karim"
            ],
            [
                "login" => "behruz",
                "full_name" => "Behruz"
            ],
            [
                "login" => "mirfayz",
                "full_name" => "Mirfayz"
            ]
        ];

        $count_student = 2000;
        $count_group_student = 50;
        $count_group = $count_student / $count_group_student;

        for ($k = 1; $k <= $count_group; $k++) {

            DeanGroup::create([
                'title' => 'SM-MMM-' . $k ,
                'language_id' => 1,
                'type_of_education_id' => 1,
                'form_of_education_id' => 2,
                'direction_id' => 16,
                'group_course_id' => 1,
                'group_akademik_year' => 31,
                'supervisor_id' => 5
            ]);
        }

        $count_student_loop = count($mas);
        $count_students_loops = $count_student / $count_student_loop;

        for ($i = 0; $i < $count_student_loop; $i++) {

            $limit = 13;

            $group_id = 1;

            for ($j = 1; $j <= $count_students_loops; $j++) {

                if($limit == $j){
                    $limit += 13;
                    $group_id += 1;
                }

                \App\Models\User::create([
                    'login' => $mas[$i]['login'] . " " . $j,
                    "full_name" => $mas[$i]['full_name'] . " " . $j ,
                    "password" => Hash::make('1111'),
                    'level_id' => 4,
                    'student_id' => $j . "" . $i . "30000",
                    'hemis_id' => $j . "" . $i . "30000",
                    'group_id' => $group_id,
                    'img_path'=> $mas[$i]['login'] . "" ."(".$j.").jpg",
                    'language_id' => 1,
                    'type_of_education_id' => 1,
                    'form_of_education_id' => 2,
                    'student_course_id' => 1,
                    'direction_id' => 16
                ]);
            }
        }
    }
}
