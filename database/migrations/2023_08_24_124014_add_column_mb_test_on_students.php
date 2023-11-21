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
        Schema::table('mb_test_on_students', function (Blueprint $table) {
            $table->dateTime('start_date_time')->nullable();
            $table->dateTime('end_date_time')->nullable();
            $table->integer('question_count')->nullable();
            $table->integer('question_success')->nullable();
            $table->integer('question_rejerect')->nullable();
            $table->float('ball', 8, 1)->nullable();
            $table->dateTime('finishing_date_time')->nullable();
            $table->integer('supervisor_view')->default(0);
            $table->integer('supervisor_question_count')->nullable();
            $table->integer('supervisor_question_success')->nullable();
            $table->integer('supervisor_question_rejerect')->nullable();
            $table->float('supervisor_ball', 8, 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mb_test_on_students', function (Blueprint $table) {
            //
        });
    }
};
