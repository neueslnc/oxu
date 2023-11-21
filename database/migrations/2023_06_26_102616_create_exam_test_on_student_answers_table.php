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
        Schema::create('exam_test_on_student_answers', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('variant')->default('1');
            $table->boolean('correct')->default(1);
            $table->integer('exam_test_on_stu_ques_id');
            $table->foreign('exam_test_on_stu_ques_id')->references('id')->on('exam_test_on_student_questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_test_answers');
    }
};
