<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('challenges')->insert([
            [ 'id' => 1, 'name' => 'Acting'],
            [ 'id' => 2, 'name' => 'Stand Up'],
            [ 'id' => 3, 'name' => 'Roast'],
            [ 'id' => 4, 'name' => 'Design'],
            [ 'id' => 5, 'name' => 'Commercial'],
            [ 'id' => 6, 'name' => 'Marketing'],
            [ 'id' => 7, 'name' => 'Dance'],
            [ 'id' => 8, 'name' => 'Choreo'],
            [ 'id' => 9, 'name' => 'Makeover'],
            [ 'id' => 10, 'name' => 'Panel Host'],
            [ 'id' => 11, 'name' => 'Improv'],
            [ 'id' => 12, 'name' => 'The Bitchelor'],
            [ 'id' => 13, 'name' => 'Bossy Rossy Show'],
            [ 'id' => 14, 'name' => 'Ball'],
            [ 'id' => 15, 'name' => 'Rusical'],
            [ 'id' => 16, 'name' => 'Rumix'],
            [ 'id' => 17, 'name' => 'Girl Group'],
            [ 'id' => 18, 'name' => 'Snatch Game of Love'],
            [ 'id' => 19, 'name' => 'Snatch Game'],
            [ 'id' => 20, 'name' => 'Talent Show'],
        ]);
    }
}
