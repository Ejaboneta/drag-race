<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('queens')->insert([
            ['id'=>1, 'name' => 'Tim Curvy',            'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/John_Johnathan%20Blackburn.png','user_id'=>1 ],
            ['id'=>2, 'name' => 'Kaliente Vanbergia',   'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Screenshot%202022-10-28%20164401_Kali%20DeVille.jpg','user_id'=>1 ],
            ['id'=>3, 'name' => 'Orgazma O\'Plenty',    'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/IMG_9727_Diana%20Ordaz.JPG','user_id'=>1 ],
            ['id'=>4, 'name' => 'SassiMexi',            'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Picture1_Annel%20Hirahoka.jpg','user_id'=>1 ],
            ['id'=>5, 'name' => 'Stilettomama',         'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Ines_Ines%20Rosales.jpg','user_id'=>1 ],
            ['id'=>6, 'name' => 'LaQueen',              'image_url'=>'','user_id'=>1 ],
            ['id'=>7, 'name' => 'Pattie Kaek',          'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Patti%20Kaeks_Eric%20Nunes.png','user_id'=>1 ],
            ['id'=>8, 'name' => 'Dame Backroll Filth',  'image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Screenshot_20221101_041128_Brittany%20Modesto.png','user_id'=>1 ],
            ['id'=>9, 'name' => 'Charles Edward Cheese','image_url'=>'https://vanbergins-my.sharepoint.com/personal/ernesto_jaboneta_agentpitstop_com/Documents/Old/Apps/Microsoft%20Forms/Van%20Berg%27s%20Drag%20Race/Question/Screenshot%202022-10-28%20163950_Remington%20Nichols.png','user_id'=>1 ],
            ['id'=>10, 'name' => 'Bougalicious Brown',  'image_url'=>'','user_id'=>1 ],
        ]);
    }
}
