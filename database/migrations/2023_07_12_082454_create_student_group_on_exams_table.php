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
        Schema::create('student_group_on_exams', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('student_group');
            $table->foreign('student_group')->references('id')->on('student_groups');
            $table->integer('exam');
            $table->foreign('exam')->references('id')->on('exams');
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
        Schema::dropIfExists('student_group_on_exams');
    }
};
