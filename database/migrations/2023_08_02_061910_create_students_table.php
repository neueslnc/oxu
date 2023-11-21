<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('language_id')->index();
            $table->integer('type_of_education_id')->index();
            $table->integer('form_of_education_id')->index();
            $table->integer('direction_id')->index();
            $table->integer('student_course_id')->index();
            $table->string('FIO');
            $table->string('phone');
            $table->timestamps();

        //     $table->foreign('language_id')->references('id')->on('languages');
        //     $table->foreign('type_of_education_id')->references('id')->on('type_of_education');
        //     $table->foreign('direction_id')->references('id')->on('directions');
        //    $table->foreign('student_course_id')->references('id')->on('student_courses');
        //    $table->foreign('form_of_education_id')->references('id')->on('form_of_education');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
