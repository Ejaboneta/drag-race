<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('series')->insert([
            ['id'=>1, 'name' => 'Van Berg\'s Drag Race', 'episode_frequency'=>'Weekly' ],
        ]);
    }
}
