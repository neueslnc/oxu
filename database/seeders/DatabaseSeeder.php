<?php

namespace Database\Seeders;

use App\Models\NBTestThemeModel;
use Illuminate\Database\Seeder;
use Database\Seeders\TypeOfEducationSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartamentSeeder::class,
            UserLevelSeeder::class,
            StudentGroupSeeder::class,
            SyllabusSeeder::class,
            AcademicYearSeeder::class,
            SemesterSeeder::class,
            SyllabusOnSemesterSeeder::class,
            ScienceSeeder::class,
            ControlTypeExamSeeder::class,
            LanguagesSeeder::class,
            DirectionSeeder::class,
            FormOfEducationSeeder::class,
            StudentCourseSeeder::class,
            TypeOfEducationSeeder::class,
            SexSeeder::class,
            DeanGroupSeeder::class,
            UserSeeder::class,
            StudentCourseSeeder::class,
            SubjectSeeder::class,
            TeacherOnSubjectSeeder::class,
            ThemesSeeder::class,
            NBTestThemesSeeder::class,
            NBTestQuestionSeeder::class,
            NBTestAnswerSeeder::class
//            GenerateTestStudentAndGroup::class
        ]);
    }
}
