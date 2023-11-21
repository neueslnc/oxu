<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mb_test_on_students', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('student_id');
            $table->foreign('student_id')->references('id')->on('users');
            $table->integer('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('mb_test_id');
            $table->foreign('mb_test_id')->references('id')->on('mb_test_themes');
            $table->string('access_key');
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mb_test_on_students');
    }
};
