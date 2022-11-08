<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TalentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talents')->insert([
            ['skill_id' => 1, 'name'=>'Acapella'],
            ['skill_id' => 1, 'name'=>'Art'],
            ['skill_id' => 1, 'name'=>'Autoharp/Singing'],
            ['skill_id' => 1, 'name'=>'Ballet Number'],
            ['skill_id' => 1, 'name'=>'Ballooning'],
            ['skill_id' => 1, 'name'=>'Bubble Burlesque'],
            ['skill_id' => 1, 'name'=>'Burlesque'],
            ['skill_id' => 1, 'name'=>'Cheerleading Comedy Routine'],
            ['skill_id' => 1, 'name'=>'Color Guard'],
            ['skill_id' => 1, 'name'=>'Comedy Skit'],
            ['skill_id' => 1, 'name'=>'Comedy'],
            ['skill_id' => 1, 'name'=>'Contemporary Mouth Art'],
            ['skill_id' => 1, 'name'=>'Dancing'],
            ['skill_id' => 1, 'name'=>'Electric Guitar'],
            ['skill_id' => 1, 'name'=>'Fire Show'],
            ['skill_id' => 1, 'name'=>'Gymnastics'],
            ['skill_id' => 1, 'name'=>'Jump Rope'],
            ['skill_id' => 1, 'name'=>'Lipsyncing'],
            ['skill_id' => 1, 'name'=>'Lipsyncing/Dancing'],
            ['skill_id' => 1, 'name'=>'Magic Show'],
            ['skill_id' => 1, 'name'=>'Majorette'],
            ['skill_id' => 1, 'name'=>'Modern Dance'],
            ['skill_id' => 1, 'name'=>'Monologue'],
            ['skill_id' => 1, 'name'=>'Opera Singing'],
            ['skill_id' => 1, 'name'=>'Original Song'],
            ['skill_id' => 1, 'name'=>'Painting'],
            ['skill_id' => 1, 'name'=>'Piano'],
            ['skill_id' => 1, 'name'=>'Pole Dancing'],
            ['skill_id' => 1, 'name'=>'Posing'],
            ['skill_id' => 1, 'name'=>'Quick Change Magic'],
            ['skill_id' => 1, 'name'=>'Rapping'],
            ['skill_id' => 1, 'name'=>'Rhytmic Gymnastic'],
            ['skill_id' => 1, 'name'=>'Runway'],
            ['skill_id' => 1, 'name'=>'Salsa Dancing'],
            ['skill_id' => 1, 'name'=>'Self-Care in Quarantine'],
            ['skill_id' => 1, 'name'=>'Singing'],
            ['skill_id' => 1, 'name'=>'Speed-Sewing'],
            ['skill_id' => 1, 'name'=>'Spoken Word'],
            ['skill_id' => 1, 'name'=>'Stand Up'],
            ['skill_id' => 1, 'name'=>'Standing There'],
            ['skill_id' => 1, 'name'=>'Tucking'],
            ['skill_id' => 1, 'name'=>'Variety'],
            ['skill_id' => 1, 'name'=>'Velcro'],
            ['skill_id' => 1, 'name'=>'Violin'],
            ['skill_id' => 1, 'name'=>'Vocal Impersonations'],
            ['skill_id' => 1, 'name'=>'Waacking'],

        ]);
    }
}
