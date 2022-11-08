<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChallengeSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('challenge_skills')->insert([
            [ 'challenge_id'=>1, 'skill_id' => 1],
            [ 'challenge_id'=>2, 'skill_id' => 2],
            [ 'challenge_id'=>3, 'skill_id' => 7],
            [ 'challenge_id'=>4, 'skill_id' => 4],
            [ 'challenge_id'=>5, 'skill_id' => 1],
            [ 'challenge_id'=>6, 'skill_id' => 1],
            [ 'challenge_id'=>7, 'skill_id' => 3],
            [ 'challenge_id'=>8, 'skill_id' => 3],
            [ 'challenge_id'=>9, 'skill_id' => 9],
            [ 'challenge_id'=>10, 'skill_id' => 7],
            [ 'challenge_id'=>11, 'skill_id' => 8],
            [ 'challenge_id'=>12, 'skill_id' => 2],
            [ 'challenge_id'=>13, 'skill_id' => 2],
            [ 'challenge_id'=>14, 'skill_id' => 4],
            [ 'challenge_id'=>15, 'skill_id' => 12],
            [ 'challenge_id'=>16, 'skill_id' => 12],
            [ 'challenge_id'=>17, 'skill_id' => 3],
            [ 'challenge_id'=>18, 'skill_id' => 8],
            [ 'challenge_id'=>19, 'skill_id' => 8],
            [ 'challenge_id'=>20, 'skill_id' => 5],
        ]);
    }
}
