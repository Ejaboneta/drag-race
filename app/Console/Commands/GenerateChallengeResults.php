<?php

namespace App\Console\Commands;

use App\Models\EpisodeChallenge;
use Illuminate\Console\Command;

class GenerateChallengeResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenge:results {challenge_id}';

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
        $challenge = EpisodeChallenge::find($this->argument('challenge_id'));

        // Tops
        $this->info('Tops');
        foreach($challenge->tops AS $top) {
            $this->comment(" - {$top->place} {$top->queen->name}");
        }
    // Bottoms
        $this->info('Bottoms');
        foreach($challenge->bottoms AS $bottom) {
            $this->comment(" - {$bottom->place} {$bottom->queen->name}");
        }
    // Winner
        $this->info('Winner');
        foreach($challenge->winners AS $winner) {
            $this->comment(" - {$winner->place} {$winner->queen->name}");
        }
    // Losers
        $this->info('Losers');
        foreach($challenge->losers AS $loser) {
            $this->comment(" - {$loser->place} {$loser->queen->name}");
        }

        return Command::SUCCESS;
    }
}
