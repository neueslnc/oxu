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
        Schema::create('mb_test_answers', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->longText('variant');
            $table->longText('writing')->nullable();
            $table->boolean('correct')->default(1);
            $table->integer('mb_test_question_id');
            $table->foreign('mb_test_question_id')->references('id')->on('mb_test_questions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mb_test_answers');
    }
};
