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
        Schema::create('exam_test_questions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->longText('question');
            $table->integer('exam_id');
            $table->foreign('exam_id')->references('id')->on('exam_test_themes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_test_questions');
    }
};
