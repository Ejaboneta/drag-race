<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueenSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('queen_skills')->insert([
            ['queen_id'=>1,'skill_id'=>1,'value'=>5],
            ['queen_id'=>2,'skill_id'=>1,'value'=>2],
            ['queen_id'=>3,'skill_id'=>1,'value'=>3],
            ['queen_id'=>4,'skill_id'=>1,'value'=>2],
            ['queen_id'=>5,'skill_id'=>1,'value'=>5],
            ['queen_id'=>6,'skill_id'=>1,'value'=>1],
            ['queen_id'=>7,'skill_id'=>1,'value'=>1],
            ['queen_id'=>8,'skill_id'=>1,'value'=>4],
            ['queen_id'=>9,'skill_id'=>1,'value'=>1],
            ['queen_id'=>10,'skill_id'=>1,'value'=>3],

            ['queen_id'=>1,'skill_id'=>2,'value'=>4],
            ['queen_id'=>2,'skill_id'=>2,'value'=>4],
            ['queen_id'=>3,'skill_id'=>2,'value'=>3],
            ['queen_id'=>4,'skill_id'=>2,'value'=>3],
            ['queen_id'=>5,'skill_id'=>2,'value'=>1],
            ['queen_id'=>6,'skill_id'=>2,'value'=>1],
            ['queen_id'=>7,'skill_id'=>2,'value'=>5],
            ['queen_id'=>8,'skill_id'=>2,'value'=>4],
            ['queen_id'=>9,'skill_id'=>2,'value'=>1],
            ['queen_id'=>10,'skill_id'=>2,'value'=>4],

            ['queen_id'=>1,'skill_id'=>3,'value'=>3],
            ['queen_id'=>2,'skill_id'=>3,'value'=>3],
            ['queen_id'=>3,'skill_id'=>3,'value'=>3],
            ['queen_id'=>4,'skill_id'=>3,'value'=>4],
            ['queen_id'=>5,'skill_id'=>3,'value'=>5],
            ['queen_id'=>6,'skill_id'=>3,'value'=>3],
            ['queen_id'=>7,'skill_id'=>3,'value'=>3],
            ['queen_id'=>8,'skill_id'=>3,'value'=>4],
            ['queen_id'=>9,'skill_id'=>3,'value'=>1],
            ['queen_id'=>10,'skill_id'=>3,'value'=>3],

            ['queen_id'=>1,'skill_id'=>4,'value'=>3],
            ['queen_id'=>2,'skill_id'=>4,'value'=>5],
            ['queen_id'=>3,'skill_id'=>4,'value'=>2],
            ['queen_id'=>4,'skill_id'=>4,'value'=>5],
            ['queen_id'=>5,'skill_id'=>4,'value'=>5],
            ['queen_id'=>6,'skill_id'=>4,'value'=>3],
            ['queen_id'=>7,'skill_id'=>4,'value'=>4],
            ['queen_id'=>8,'skill_id'=>4,'value'=>4],
            ['queen_id'=>9,'skill_id'=>4,'value'=>1],
            ['queen_id'=>10,'skill_id'=>4,'value'=>4],

            ['queen_id'=>1,'skill_id'=>8,'value'=>4],
            ['queen_id'=>2,'skill_id'=>8,'value'=>2],
            ['queen_id'=>3,'skill_id'=>8,'value'=>4],
            ['queen_id'=>4,'skill_id'=>8,'value'=>2],
            ['queen_id'=>5,'skill_id'=>8,'value'=>2],
            ['queen_id'=>6,'skill_id'=>8,'value'=>1],
            ['queen_id'=>7,'skill_id'=>8,'value'=>5],
            ['queen_id'=>8,'skill_id'=>8,'value'=>4],
            ['queen_id'=>9,'skill_id'=>8,'value'=>1],
            ['queen_id'=>10,'skill_id'=>8,'value'=>3],

            ['queen_id'=>1,'skill_id'=>10,'value'=>3],
            ['queen_id'=>2,'skill_id'=>10,'value'=>4],
            ['queen_id'=>3,'skill_id'=>10,'value'=>5],
            ['queen_id'=>4,'skill_id'=>10,'value'=>3],
            ['queen_id'=>5,'skill_id'=>10,'value'=>2],
            ['queen_id'=>6,'skill_id'=>10,'value'=>2],
            ['queen_id'=>7,'skill_id'=>10,'value'=>3],
            ['queen_id'=>8,'skill_id'=>10,'value'=>4],
            ['queen_id'=>9,'skill_id'=>10,'value'=>1],
            ['queen_id'=>10,'skill_id'=>10,'value'=>4],

            ['queen_id'=>1,'skill_id'=>11,'value'=>3],
            ['queen_id'=>2,'skill_id'=>11,'value'=>3],
            ['queen_id'=>3,'skill_id'=>11,'value'=>5],
            ['queen_id'=>4,'skill_id'=>11,'value'=>5],
            ['queen_id'=>5,'skill_id'=>11,'value'=>5],
            ['queen_id'=>6,'skill_id'=>11,'value'=>1],
            ['queen_id'=>7,'skill_id'=>11,'value'=>4],
            ['queen_id'=>8,'skill_id'=>11,'value'=>4],
            ['queen_id'=>9,'skill_id'=>11,'value'=>1],
            ['queen_id'=>10,'skill_id'=>11,'value'=>4],

        ]);
    }
}
