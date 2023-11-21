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
        Schema::create('syllabus_on_semesters', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('syllabus_id');
            $table->foreign('syllabus_id')->references('id')->on('syllabi');
            $table->integer('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters');
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
        Schema::dropIfExists('syllabus_on_semesters');
    }
};
