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
            $table->integer('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->integer('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');            
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
