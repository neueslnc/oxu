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
        Schema::create('themes', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->longText('theme_name');
            $table->longText('theme_text');
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('status')->default(0);
            $table->integer('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
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
        Schema::dropIfExists('themes');
    }
};
