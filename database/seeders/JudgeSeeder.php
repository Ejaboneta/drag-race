<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JudgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('judges')->insert([
            [ 'name' => 'Rupaul', 'is_guest' => 0],
            [ 'name' => 'Ross Matthews', 'is_guest' => 0],
            [ 'name' => 'Michelle Visage', 'is_guest' => 0],
            [ 'name' => 'Carson Kressley', 'is_guest' => 0],
            [ 'name' => 'Todrick Hall', 'is_guest' => 1],
            [ 'name' => 'Brittany Spears', 'is_guest' => 1],
            [ 'name' => 'Madonna', 'is_guest' => 1],
            [ 'name' => 'Bowen Yang', 'is_guest' => 1],
            [ 'name' => 'Katy Perry', 'is_guest' => 1],
            [ 'name' => 'Michelle Williams', 'is_guest' => 1],
        ]);
    }
}
