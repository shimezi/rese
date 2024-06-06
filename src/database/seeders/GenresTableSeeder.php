<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            ['name' => '居酒屋'],
            ['name' => 'イタリアン'],
            ['name' => '寿司'],
            ['name' => 'ラーメン'],
            ['name' => '焼肉'],
        ]);
    }
}
