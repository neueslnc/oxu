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
        Schema::create('exam_test_on_student_questions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('exam_test_on_student_id');
            $table->foreign('exam_test_on_student_id')->references('id')->on('exam_test_on_students');
            $table->integer('exam_test_question_id');
            $table->foreign('exam_test_question_id')->references('id')->on('exam_test_questions');
            $table->integer('ball');
            $table->longText('question');
            $table->string('type');
            $table->integer('waiting_seconds')->default(30);
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_test_on_student_questions');
    }
};
