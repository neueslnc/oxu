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
        Schema::table('dean_groups', function (Blueprint $table) {
            $table->integer('language_id')->unsigned()->after('title')->comment('guruh tili');
            $table->integer('type_of_education_id')->unsigned()->after('language_id')->comment('kuzduzgi sirtqi');
            $table->integer('form_of_education_id')->unsigned()->after('type_of_education_id')->comment('magistr bakalavr');
            $table->integer('direction_id')->unsigned()->after('form_of_education_id')->comment('ta`lim fakulteti');
            $table->integer('group_course_id')->unsigned()->after('direction_id')->comment('guruh kursi');
            $table->integer('group_akademik_year')->unsigned()->after('group_course_id')->comment('guruh o`qiyotgan yil');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dean_groups', function (Blueprint $table) {
            $table->dropColumn('language_id');
            $table->dropColumn('type_of_education_id');
            $table->dropColumn('form_of_education_id');
            $table->dropColumn('direction_id');
            $table->dropColumn('group_course_id');
            $table->dropColumn('group_akademik_year');

        });
    }
};
