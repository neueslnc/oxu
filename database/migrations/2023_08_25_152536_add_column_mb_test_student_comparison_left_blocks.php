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
        Schema::table('mb_test_student_comparison_left_blocks', function (Blueprint $table) {
            $table->integer('mb_t_o_q_id')->nullable();
            $table->foreign('mb_t_o_q_id')->references('id')->on('mb_test_on_student_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mb_test_student_comparison_left_blocks', function (Blueprint $table) {
            //
        });
    }
};
