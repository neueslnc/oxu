<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')
            ->insert([
                'title' => 'Erkak'
            ]);

        DB::table('sexes')
            ->insert([
                'title' => 'Ayol'
            ]);
    }
}
