<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Action',
        ]);

        DB::table('categories')->insert([
            'name' => 'Adventure',
        ]);

        DB::table('categories')->insert([
            'name' => 'Role-Playing',
        ]);

        DB::table('categories')->insert([
            'name' => 'Strategy',
        ]);

        DB::table('categories')->insert([
            'name' => 'Simulation',
        ]);

        DB::table('categories')->insert([
            'name' => 'Sports',
        ]);

        DB::table('categories')->insert([
            'name' => 'Puzzle',
        ]);

        DB::table('categories')->insert([
            'name' => 'Horror',
        ]);

        DB::table('categories')->insert([
            'name' => 'Racing',
        ]);

        DB::table('categories')->insert([
            'name' => 'Fighting',
        ]);

        DB::table('categories')->insert([
            'name' => 'MMORPG',
        ]);

        DB::table('categories')->insert([
            'name' => 'Educational',
        ]);

        DB::table('categories')->insert([
            'name' => 'Simulation',
        ]);

        DB::table('categories')->insert([
            'name' => 'Casual',
        ]);

        DB::table('categories')->insert([
            'name' => 'Music',
        ]);

        DB::table('categories')->insert([
            'name' => 'Board Games',
        ]);

    }
}
