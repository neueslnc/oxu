<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'login' => "super_admin",
            "full_name" => "Super Admin",
            "password" => Hash::make('1111'),
            'level_id' => 1
        ]);

        \App\Models\User::create([
            'login' => "rektor",
            "full_name" => "Rector",
            "password" => Hash::make('1234'),
            'level_id' => 8
        ]);

        \App\Models\User::create([
            'login' => "admin",
            "full_name" => "Alisher Jumaev",
            "departament_id" => 1,
            "password" => Hash::make('1111'),
            'level_id' => 2
        ]);

        \App\Models\User::create([
            'login' => "test",
            "full_name" => "Safarof Sardor Amonovich",
            "departament_id" => 1,
            "password" => Hash::make('test'),
            'level_id' => 3
        ]);

        \App\Models\User::create([
            'login' => "nazoratchi",
            "full_name" => "Falonchayev Faloncha",
            "departament_id" => 1,
            "password" => Hash::make('1111'),
            'level_id' => 5
        ]);


        \App\Models\User::create([
            'login' => "dean",
            "full_name" => "Sh.F.Davronova",
            "departament_id" => 1,
            "password" => Hash::make('1111'),
            'level_id' => 6
        ]);

        \App\Models\User::create([
            'login' => "sadik",
            "full_name" => "Sadikov Mamarayim",
            "password" => Hash::make('1111'),
            'level_id' => 7
        ]);

        \App\Models\User::create([
            'login' => "booker",
            "full_name" => "Test Test Test",
            "password" => Hash::make('1111'),
            'level_id' => 9
        ]);

        \App\Models\User::create([
            'login' => "nb_controller",
            "full_name" => "**** **** ****",
            "password" => Hash::make('741852'),
            'level_id' => 10
        ]);



//        for ($i = 1; $i <= 500; $i++) {
//
//            $group_id = 0;
//
//            if($i <= 50){
//
//                $group_id = 1;
//            }elseif ($i <= 100){
//
//                $group_id = 2;
//            }elseif ($i <= 150){
//
//                $group_id = 3;
//            }elseif ($i <= 200){
//
//                $group_id = 4;
//            }elseif ($i <= 250){
//
//                $group_id = 5;
//            }elseif ($i <= 300){
//
//                $group_id = 6;
//            }elseif ($i <= 350){
//
//                $group_id = 7;
//            }elseif ($i <= 400){
//
//                $group_id = 8;
//            }elseif ($i <= 450){
//
//                $group_id = 9;
//            }elseif ($i <= 500){
//
//                $group_id = 10;
//            }
//
//            \App\Models\User::create([
//                'login' => "vadim ". $i,
//                "full_name" => "Vadim Dibcev Lochinovich ". $i ,
//                "password" => Hash::make('1111'),
//                'level_id' => 4,
//                'student_id' => $i . "10000",
//                'hemis_id' => $i . "10000",
//                'group_id' => $group_id,
//                'img_path'=> "vadim(".$i.").jpg",
//                'language_id' => 1,
//                'type_of_education_id' => 1,
//                'form_of_education_id' => 2,
//                'student_course_id' => 1,
//                'direction_id' => 16
//            ]);
//        }
//
//        for ($i = 1; $i <= 500; $i++) {
//
//            $group_id = 0;
//
//            if($i <= 50){
//
//                $group_id = 1;
//            }elseif ($i <= 100){
//
//                $group_id = 2;
//            }elseif ($i <= 150){
//
//                $group_id = 3;
//            }elseif ($i <= 200){
//
//                $group_id = 4;
//            }elseif ($i <= 250){
//
//                $group_id = 5;
//            }elseif ($i <= 300){
//
//                $group_id = 6;
//            }elseif ($i <= 350){
//
//                $group_id = 7;
//            }elseif ($i <= 400){
//
//                $group_id = 8;
//            }elseif ($i <= 450){
//
//                $group_id = 9;
//            }elseif ($i <= 500){
//
//                $group_id = 10;
//            }
//
//            \App\Models\User::create([
//                'login' => "karim ". $i,
//                "full_name" => "Mirzayev Karim ". $i ,
//                "password" => Hash::make('1111'),
//                'level_id' => 4,
//                'student_id' => $i . "20000",
//                'hemis_id' => $i . "20000",
//                'group_id' => $group_id,
//                'img_path'=> "karim(".$i.").jpg",
//                'language_id' => 1,
//                'type_of_education_id' => 1,
//                'form_of_education_id' => 2,
//                'student_course_id' => 1,
//                'direction_id' => 16
//            ]);
//        }
//
//        for ($i = 1; $i <= 500; $i++) {
//
//            $group_id = 0;
//
//            if($i <= 50){
//
//                $group_id = 1;
//            }elseif ($i <= 100){
//
//                $group_id = 2;
//            }elseif ($i <= 150){
//
//                $group_id = 3;
//            }elseif ($i <= 200){
//
//                $group_id = 4;
//            }elseif ($i <= 250){
//
//                $group_id = 5;
//            }elseif ($i <= 300){
//
//                $group_id = 6;
//            }elseif ($i <= 350){
//
//                $group_id = 7;
//            }elseif ($i <= 400){
//
//                $group_id = 8;
//            }elseif ($i <= 450){
//
//                $group_id = 9;
//            }elseif ($i <= 500){
//
//                $group_id = 10;
//            }
//
//            \App\Models\User::create([
//                'login' => "behruz ". $i,
//                "full_name" => "Behruz ". $i ,
//                "password" => Hash::make('1111'),
//                'level_id' => 4,
//                'student_id' => $i . "30000",
//                'hemis_id' => $i . "30000",
//                'group_id' => $group_id,
//                'img_path'=> "behruz(".$i.").jpg",
//                'language_id' => 1,
//                'type_of_education_id' => 1,
//                'form_of_education_id' => 2,
//                'student_course_id' => 1,
//                'direction_id' => 16
//            ]);
//        }
//
//        for ($i = 1; $i <= 500; $i++) {
//
//            $group_id = 0;
//
//            if($i <= 50){
//
//                $group_id = 1;
//            }elseif ($i <= 100){
//
//                $group_id = 2;
//            }elseif ($i <= 150){
//
//                $group_id = 3;
//            }elseif ($i <= 200){
//
//                $group_id = 4;
//            }elseif ($i <= 250){
//
//                $group_id = 5;
//            }elseif ($i <= 300){
//
//                $group_id = 6;
//            }elseif ($i <= 350){
//
//                $group_id = 7;
//            }elseif ($i <= 400){
//
//                $group_id = 8;
//            }elseif ($i <= 450){
//
//                $group_id = 9;
//            }elseif ($i <= 500){
//
//                $group_id = 10;
//            }
//
//            \App\Models\User::create([
//                'login' => "mirfayz ". $i,
//                "full_name" => "Mirfayz ". $i ,
//                "password" => Hash::make('1111'),
//                'level_id' => 4,
//                'student_id' => $i . "40000",
//                'hemis_id' => $i . "40000",
//                'group_id' => $group_id,
//                'img_path'=> "mirfayz(".$i.").jpg",
//                'language_id' => 1,
//                'type_of_education_id' => 1,
//                'form_of_education_id' => 2,
//                'student_course_id' => 1,
//                'direction_id' => 16
//            ]);
//        }

//         \App\Models\User::create([
//             'login' => "bekruz",
//             "full_name" => "Salimov Bexruzbek",
//             "password" => Hash::make('1111'),
//             'level_id' => 4,
//             'hemis_id' => '844561231',
//             'group_id' => 1,
//             'img_path'=>'3.jpg',
//         ]);
//
//
//
//         \App\Models\User::create([
//             'login' => "mirfayz",
//             "full_name" => "Mirfayz",
//             "password" => Hash::make('1111'),
//             'level_id' => 4,
//             'hemis_id' => '84451231',
//             'group_id' => 1,
//             'img_path'=>'2.jpg',
//         ]);

       \App\Models\User::create([
           'login' => "karim",
           'hemis_id' => '1111',
           "full_name" => "Mirzayev Karim",
           "password" => Hash::make('1111'),
           'level_id' => 4,
           'student_id' => '8445632',
           'group_id' => 1,
           'img_path'=>'1.jpg',
           'language_id' => 1,
           'type_of_education_id' => 1,
           'form_of_education_id' => 2,
           'student_course_id' => 1,
           'direction_id' => 16
       ]);
    }
}
