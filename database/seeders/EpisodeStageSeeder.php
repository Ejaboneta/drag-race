<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('episode_stages')->insert([
            [ 'id'=>1, 'order' => 1, 'name' => 'Season Premier', 'episode'=>'1',    'image' => 'entrance.webp'],
            [ 'id'=>2, 'order' => 1, 'name' => 'Episode Opening','episode'=>null,   'image' => 'werqroom.webp'],
            [ 'id'=>3, 'order' => 2, 'name' => 'Mini Challenge', 'episode'=>null,   'image' => 'minichallenge.gif'],
            [ 'id'=>4, 'order' => 3, 'name' => 'Main Challenge', 'episode'=>null,   'image' => 'mainstage.webp'],
            [ 'id'=>5, 'order' => 4, 'name' => 'In the Werq Room','episode'=>null,  'image' => 'werqstations.gif'],
            [ 'id'=>6, 'order' => 5, 'name' => 'On the Runway',  'episode'=>null,   'image' => 'runway.gif'],
            [ 'id'=>7, 'order' => 6, 'name' => 'Deliberation',   'episode'=>null,   'image' => 'judges.webp'],
            [ 'id'=>8, 'order' => 7, 'name' => 'Lip Sync',       'episode'=>null,   'image' => 'lipsync.gif'],
            [ 'id'=>9, 'order' => 8, 'name' => 'Elimination',    'episode'=>null,   'image' => 'sashay.gif'],
 ]);
    }
}
