<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'title' => 'Assassin\'s Creed Valhalla',
            'description' => 'An action-adventure RPG',
            'release_date' => '2020-11-10',
            'developer' => 'Ubisoft Montreal',
            'platform' => 'PlayStation 4',
            'category_id' => 1, 
        ]);

        DB::table('games')->insert([
            'title' => 'The Legend of Zelda: Breath of the Wild',
            'description' => 'An action-adventure RPG',
            'release_date' => '2017-03-03',
            'developer' => 'Nintendo',
            'platform' => 'Nintendo Switch',
            'category_id' => 2,
        ]);
    }
}
