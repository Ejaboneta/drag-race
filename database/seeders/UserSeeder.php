<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Ernesto Jaboneta',
                'email' => 'Ernesto.Jaboneta@agentpitstop.com',
                'password' => '$2y$10$/jMLC7cbuNv2YAGtR.QKg.r2MBnd2ZBsoBhxQyWfL7iBGUigcf4wC',
            ],
        ]);

        DB::table('teams')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'name' => 'Ernesto\'s Team',
                'personal_team' => 1,
            ],
        ]);
    }
}
