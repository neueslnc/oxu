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
        Schema::table('mb_test_on_students', function (Blueprint $table) {
            $table->integer('mb_test_theme_id');
            $table->foreign('mb_test_theme_id')->references('id')->on('mb_test_themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mb_test_on_students', function (Blueprint $table) {
            //
        });
    }
};
