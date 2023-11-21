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
        Schema::table('mb_test_comparison_right_blocks', function (Blueprint $table) {
            $table->integer('mb_test_question_id')->nullable();
            $table->foreign('mb_test_question_id')->references('id')->on('mb_test_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mb_test_comparison_right_blocks', function (Blueprint $table) {
            //
        });
    }
};
