<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            ['id'=>1, 'series_id'=>1, 'name' => 'Season 1','status'=>'New','total_episodes'=>0 ],
        ]);
    }
}
