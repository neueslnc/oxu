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
        Schema::table('exam_test_on_students', function (Blueprint $table) {
            $table->integer('question_count')->nullable();
            $table->integer('question_success')->nullable();
            $table->integer('question_rejerect')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam_test_on_students', function (Blueprint $table) {
            //
        });
    }
};
