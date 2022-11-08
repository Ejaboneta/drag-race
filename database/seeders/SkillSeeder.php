<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skills')->insert([
            [ 'id'=>1, 'name'=>'Acting'],
            [ 'id'=>2, 'name'=>'Comedy'],
            [ 'id'=>3, 'name'=>'Dance'],
            [ 'id'=>4, 'name'=>'Design'],
            [ 'id'=>5, 'name'=>'Confidence'],
            [ 'id'=>6, 'name'=>'Fashion'],
            [ 'id'=>7, 'name'=>'Hosting'],
            [ 'id'=>8, 'name'=>'Improv'],
            [ 'id'=>9, 'name'=>'Makeup'],
            [ 'id'=>10, 'name'=>'Lip Sync'],
            [ 'id'=>11, 'name'=>'Runway'],
            [ 'id'=>12, 'name'=>'Singing'],
        ]);
    }
}
