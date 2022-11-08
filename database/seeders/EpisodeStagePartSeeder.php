<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeStagePartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('episode_stage_parts')->insert([
            [ 'episode_stage_id'=>1, 'order' => 1,'slug'=>'first_episode',  'name' => 'First Episode', 'relationship' => ''],
            [ 'episode_stage_id'=>1, 'order' => 2,'slug'=>'entrance',       'name' => 'Entrances',      'relationship' => ''],
            [ 'episode_stage_id'=>2, 'order' => 3,'slug'=>'opening',        'name' => 'Episode Opening','relationship' => ''],
            [ 'episode_stage_id'=>3, 'order' => 1,'slug'=>'mini_challenge', 'name' => 'Mini Challenge', 'relationship' => 'mini_challenge'],
            [ 'episode_stage_id'=>3, 'order' => 2,'slug'=>'mini_challenge_results', 'name' => 'And the winner is...', 'relationship' => 'mini_challenge'],
            [ 'episode_stage_id'=>4, 'order' => 1,'slug'=>'main_challenge', 'name' => 'Main Challenge', 'relationship' => 'main_challenge'],
            [ 'episode_stage_id'=>4, 'order' => 1,'slug'=>'main_challenge_results', 'name' => 'Great Job!', 'relationship' => 'main_challenge'],
            [ 'episode_stage_id'=>5, 'order' => 1,'slug'=>'werq_room_intro',      'name' => '','relationship' => ''],
            [ 'episode_stage_id'=>5, 'order' => 1,'slug'=>'werq_room',      'name' => 'The Drama...','relationship' => ''],
            [ 'episode_stage_id'=>6, 'order' => 1,'slug'=>'runway',         'name' => 'Runway',         'relationship' => 'runway'],
            [ 'episode_stage_id'=>6, 'order' => 2,'slug'=>'runway_results', 'name' => 'Runway Results', 'relationship' => 'runway'],
            [ 'episode_stage_id'=>7, 'order' => 1,'slug'=>'deliberation',   'name' => 'I\'ve made my decision...','relationship' => ''],
            [ 'episode_stage_id'=>8, 'order' => 1,'slug'=>'lip_sync',        'name' => 'Lip Sync',       'relationship' => 'lip_sync'],
            [ 'episode_stage_id'=>9, 'order' => 1,'slug'=>'elimination',    'name' => 'Elimination',    'relationship' => ''],
        ]);
    }
}
