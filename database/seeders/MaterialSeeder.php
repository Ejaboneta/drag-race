<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('talents')->insert([
            ['name'=>'Carpet'],
            ['name'=>'Denim'],
            ['name'=>'Feathers'],
            ['name'=>'Glow in the Dark Fabric'],
            ['name'=>'Lace'],
            ['name'=>'Lamp Shades'],
            ['name'=>'Leather'],
            ['name'=>'Newspaper'],
            ['name'=>'Satin'],
            ['name'=>'Silk'],
            ['name'=>'Thrift Store Finds'],
            ['name'=>'Velcro'],
            ['name'=>'Velvet'],
            ['name'=>'Wool'],
        ]);
    }
}
