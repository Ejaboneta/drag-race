<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonQueenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('season_queens')->insert([
            ['season_id'=>1, 'queen_id' => 1],
            ['season_id'=>1, 'queen_id' => 2],
            ['season_id'=>1, 'queen_id' => 3],
            ['season_id'=>1, 'queen_id' => 4],
            ['season_id'=>1, 'queen_id' => 5],
            ['season_id'=>1, 'queen_id' => 6],
            ['season_id'=>1, 'queen_id' => 7],
            ['season_id'=>1, 'queen_id' => 8],
            ['season_id'=>1, 'queen_id' => 9],
            ['season_id'=>1, 'queen_id' => 10],
        ]);
    }
}
