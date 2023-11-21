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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index()->comment('talaba');
            $table->integer('semester_id')->index()->comment('semester');
            $table->integer('direction_id')->index()->comment('yo`nalish');
            $table->integer('science_id')->index()->comment('fan');
            $table->integer('subject_id')->index()->comment('mavzu');
            $table->string('date')->comment('sana');
            $table->integer('status')->comment('davomati ya`ni(darsda bo`lsa 1, darsda bo`lmasa 0)')->default(1);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('science_id')->references('id')->on('sciences');
            $table->foreign('subject_id')->references('id')->on('subjects');
//            $table->foreign('direction_id')->references('id')->on('directions')->onDelete('cascade');

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
        Schema::dropIfExists('supervisors');
    }
};
