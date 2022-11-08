<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SkillSeeder::class,
            CategorySeeder::class,
            ChallengeSeeder::class,
            EpisodeStageSeeder::class,
            EpisodeStagePartSeeder::class,
            JudgeSeeder::class,
            SongSeeder::class,
            ThemeSeeder::class,
            ReadSeeder::class,
            SeriesSeeder::class,
            SeasonSeeder::class,
            TalentSeeder::class,
            TextSeeder::class,
            QueenSeeder::class,
            QueenSkillSeeder::class,
            SeasonQueenSeeder::class,
        ]);
    }
}
