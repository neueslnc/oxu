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
        Schema::create('drift', function (Blueprint $table) {
            $table->id();
            $table->integer('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->integer('semestr_id');
            $table->foreign('semestr_id')->references('id')->on('semesters');
            $table->integer('type_id');
            $table->foreign('type_id')->references('id')->on('type_of_education');
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('drift');
    }
};
