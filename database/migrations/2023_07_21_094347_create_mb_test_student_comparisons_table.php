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
        Schema::create('mb_test_student_comparisons', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('st_block_left_id');
            $table->foreign('st_block_left_id')->references('id')->on('mb_test_student_comparison_left_blocks');
            $table->integer('st_block_right_id');
            $table->foreign('st_block_right_id')->references('id')->on('mb_test_student_comparison_right_blocks');
            $table->integer('mb_test_on_student_qt_id');
            $table->foreign('mb_test_on_student_qt_id')->references('id')->on('mb_test_on_student_questions');
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
        Schema::dropIfExists('mb_test_student_comparisons');
    }
};
