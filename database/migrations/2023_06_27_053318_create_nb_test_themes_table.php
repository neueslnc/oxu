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
        Schema::create('mb_test_themes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('theme_id');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mb_test_themes');
    }
};
