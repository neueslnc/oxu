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
        Schema::create('exams', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('name');
            $table->string('explanation');
            $table->integer('syllabus_id')->nullable();
            $table->foreign('syllabus_id')->references('id')->on('syllabi');
            $table->integer('control_type_id');
            $table->foreign('control_type_id')->references('id')->on('control_type_exams');
            $table->integer('status');
            $table->dateTime('start_date');
            $table->dateTime('expiration_date');
            $table->integer('maximum_score');
            $table->integer('time_limit_minutes');
            $table->integer('attempts');
            $table->integer('number_questions');
            $table->integer('random')->nullable();
            $table->integer('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->integer('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->integer('science_id');
            $table->foreign('science_id')->references('id')->on('sciences');
            $table->integer('tur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
};
