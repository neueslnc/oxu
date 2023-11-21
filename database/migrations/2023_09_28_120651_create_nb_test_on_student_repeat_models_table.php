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
        Schema::create('nb_test_on_student_repeats', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('nb_test_on_student_id');
            $table->foreign('nb_test_on_student_id')->on('mb_test_on_students')->references('id');
            $table->dateTime('start_date_time')->nullable();
            $table->dateTime('end_date_time')->nullable();
            $table->integer('question_success')->nullable();
            $table->integer('question_rejerect')->nullable();
            $table->float('ball', 8, 1)->nullable();
            $table->longText('copy_question')->nullable();
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
        Schema::dropIfExists('nb_test_on_student_repeat_models');
    }
};
