<?php

namespace Database\Seeders;

use App\Domain\Deans\Groups\Models\DeanGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeanGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeanGroup::create([
            'title' => 'SM-MMM-1',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-2',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-3',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-4',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-5',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-6',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-7',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-8',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

        DeanGroup::create([
            'title' => 'SM-MMM-9',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);
        DeanGroup::create([
            'title' => 'SM-MMM-10',
            'language_id' => 1,
            'type_of_education_id' => 1,
            'form_of_education_id' => 2,
            'direction_id' => 16,
            'group_course_id' => 1,
            'group_akademik_year' => 31,
            'supervisor_id' => 5
        ]);

    }
}
