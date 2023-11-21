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
        Schema::create('mb_test_questions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->longText('question');
            $table->string('type');
            $table->integer('waiting_seconds')->default(30);
            $table->integer('mb_test_theme_id');
            $table->foreign('mb_test_theme_id')->references('id')->on('mb_test_themes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mb_test_questions');
    }
};
