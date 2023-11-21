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
        Schema::table('play_mobile_models', function (Blueprint $table) {
            $table->string('message_id')->after('taker_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('play_mobile_models', function (Blueprint $table) {
            $table->dropColumn('message_id');
        });
    }
};
