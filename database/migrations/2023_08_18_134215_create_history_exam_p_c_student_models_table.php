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
        Schema::create('history_exam_p_c_student', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('exam_pc_id');
            $table->foreign('exam_pc_id')->on('exams_contorl_p_c_s')->references('id');
            $table->integer('student_id');
            $table->foreign('student_id')->on('users')->references('id');
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
        Schema::dropIfExists('history_exam_p_c_student_models');
    }
};
