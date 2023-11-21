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
        Schema::create('transfer_student_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('talaba');
            $table->integer('exit_direction_id')->comment('ushbu yo`nalishdan ko`chirildi')->nullable();
            $table->integer('transfer_direction_id')->comment('ushbu yo`nalishga ko`chdi')->nullable();
            $table->integer('exit_group_id')->comment('ushbu guruhdan ko`chirildi')->nullable();
            $table->integer('transfer_group_id')->comment('ushbu guruhga ko`chdi')->nullable();
            $table->string('date')->comment('holat vaqti')->nullable();
            $table->integer('status')->comment('Holat (1 - ko`chgan, 2- talabalar safidan chiqorilgan, 3 - akademik ta`til berilgan, 4 - hayfsan berilgan, 5 - boshqa otmga ko`chgan, 6 - o`qishni qyta tiklagan)')->default(0);
            $table->timestamps();

//            $table->foreign('student_id')->references('id')->on('students');
//            $table->foreign('exit_direction_id')->references('id')->on('directions');
//            $table->foreign('transfer_direction_id')->references('id')->on('directions');
//            $table->foreign('exit_group_id')->references('id')->on('dean_groups');
//            $table->foreign('transfer_group_id')->references('id')->on('dean_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_student_groups');
    }
};
