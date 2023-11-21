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
        Schema::create('direction_on_supervisors', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('superviosr_id');
            $table->foreign('superviosr_id')->references('id')->on('users');
            $table->integer('direction_id');
            $table->foreign('direction_id')->references('id')->on('directions');
            $table->integer('status')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('direction_on_supervisors');
    }
};
