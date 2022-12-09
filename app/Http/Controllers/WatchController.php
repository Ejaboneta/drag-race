<?php

namespace App\Http\Controllers;

use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeStage;
use App\Models\Seasons\Season;

use Inertia\Inertia;

class WatchController extends Controller {

    public function episodes() {
        // $token = $request->session()->token();
        $season = Season::with('episodes')->latest('created_at')->first();
        return Inertia::render('Watch',['season'=>$season,'queens'=>$season->queens]);
    }

    public function watch(Episode $episode, $stage_number) {
        $texts = collect();
        $stage = $episode->stage($stage_number);

        foreach($stage->parts AS $part) {
            $array = [
                'id' => $part->id,
                'name' => $part->name,
                'items' => $part->texts,
            ];
            $texts->push($array);
        }
        return Inertia::render('Play',['season'=>$episode->season,'episode'=>$episode,'stage'=>$stage,'texts'=>$texts]);
    }



    public function summary(Episode $episode,) {
        $season = $episode->season;
        $summary = [
            [
                'title'=>'Mini Challenge',
                'texts' => $episode->mini_challenge->texts()->where('stage','=','mini_challenge_results')->get(),
            ],
            [
                'title'=>'Main Challenge',
                'texts' => $episode->main_challenge->texts()->where('stage','=','main_challenge_results')->get(),
            ],
            [
                'title'=>'Runway',
                'texts' => $episode->runway->texts()->where('stage','=','runway_results')->get(),
            ],
            [
                'title'=>'Lip Sync',
                'texts' => $episode->lip_sync->texts()->where('stage','=','lip_sync')->get(),
            ],
            [
                'title'=>'Elimination',
                'texts' => $episode->texts()->where('stage','=','elimination')->get(),
            ],
        ];

        $ranking = [
            'queens' => $season->queens()->orderBy('place')->get()->pluck('queen'),
            'episodes' => collect(),
        ];
        foreach($season->episodes()->where('number','<=',$episode->number)->get() AS $ep) {
            $item = [
                'number'=> $ep->number
            ];

            // List Queens
                $winners = $ep->winners->pluck('queen_id');
                $tops = $ep->tops->pluck('queen_id');
                $bottoms = $ep->bottoms->pluck('queen_id');
                $eliminated = $ep->eliminated->pluck('queen_id');

            foreach($ep->queens()->orderBy('place')->get() AS $queen) {
                $standing = 'Safe';
                if($winners->contains($queen->queen_id)) {
                    $standing = 'Winner';
                } elseif($tops->contains($queen->queen_id)) {
                    $standing = 'Top';
                } elseif($eliminated->contains($queen->queen_id)) {
                    $standing = 'Eliminated';
                } elseif($bottoms->contains($queen->queen_id)) {
                    $standing = 'Bottom';
                }


                $item['queens'][$queen->queen_id] = [
                    'queen' => $queen,
                    'standing' => $standing,
                    'place' => $queen->place
                ];
            }
            $ranking['episodes']->push($item);
        }

        return Inertia::render('Summary',[
            'episode'=>$episode,
            'season'=>$season,
            'queens'=>$episode->queens,
            'summary' => $summary,
            'ranking' => $ranking,
        ]);
    }
}
