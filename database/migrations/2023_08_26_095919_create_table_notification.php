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
        Schema::create('notifications', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('taker_id');
            $table->foreign('taker_id')->references('id')->on('users');
            $table->string('body', 2500)->nullable();
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
        Schema::dropIfExists('notification');
            
      
    }
};
