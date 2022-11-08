<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name'=>'Feathers'],
            ['name'=>'Fascinator'],
            ['name'=>'Pink'],
            ['name'=>'Purple Reign'],
            ['name'=>'Caftans'],
            ['name'=>'Trains'],
            ['name'=>'Yellow'],
            ['name'=>'White'],
            ['name'=>'Black'],
            ['name'=>'Ugly Dress'],
            ['name'=>'Naughty'],
            ['name'=>'Crazy Sexy Cool'],
            ['name'=>'Country'],
            ['name'=>'Phoenix'],
            ['name'=>'Silver'],
            ['name'=>'2 in 1'],
            ['name'=>'Surprise!'],
            ['name'=>'Gold'],
            ['name'=>'Blue'],
            ['name'=>'Fish'],
            ['name'=>'Butch'],
            ['name'=>'Amazon'],
            ['name'=>'All That Glitters'],
            ['name'=>'Facekini'],
            ['name'=>'Zodiac Sign'],
            ['name'=>'Spring'],
            ['name'=>'Fall'],
            ['name'=>'Caftan'],
            ['name'=>'Plastique Fantastique'],
            ['name'=>'Goddess'],
            ['name'=>'Club Kid'],
            ['name'=>'Retro'],
            ['name'=>'Rollergirls'],
            ['name'=>'Country'],
            ['name'=>'Candy'],
            ['name'=>'Chaps'],
            ['name'=>'Mirror, Mirror'],
            ['name'=>'Circus'],
            ['name'=>'Latex'],
            ['name'=>'Denim & Diamonds'],
            ['name'=>'Rebellion'],
            ['name'=>'Divalicious'],
            ['name'=>'Flower'],
            ['name'=>'Pageant'],
            ['name'=>'Futurism'],
        ]);
    }
}
