<?php

namespace App\Console\Commands;

use App\Models\Season;
use Illuminate\Console\Command;

class GenerateEpisode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'season:next-episode {season_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $season = Season::find($this->argument('season_id'));
        $results = $season->nextEpisode();
        return Command::SUCCESS;
    }
}
