<?php

namespace App\Models\LipSyncs;

use App\Models\Episodes\Episode;
use App\Models\ObjectText;
use App\Models\Seasons\Season;
use App\Models\Skills\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LipSync extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['season_id','episode_id','song_id','is_lalaparuza','round'];

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function episode() {
        return $this->belongsTo(Episode::class);
    }


    public function texts() {
        return $this->morphMany(ObjectText::class,'object');
    }

    public function queens() {
        return $this->hasMany(LipSyncQueen::class);
    }

    public function song() {
        return $this->belongsToMany(Song::class);
    }

    // Winners
        public function getWinnersAttribute() {
            return $this->queens->where('place','=',1);
        }

    // Losers
        public function getLosersAttribute() {
            $last = $this->queens->max('place');
            return $this->queens->where('place','=',$last);
        }


    public function results($queens=[]) {
        $skill = Skill::where('name','=','Lip Sync')->first();
        $results = collect();
        foreach($queens AS $loser) {
            echo $loser->queen->name."\n";
            $queen = $loser->queen;
            $queen_skill = $queen->skills()->where('skill_id','=',$skill->id)->first();
            $total_score = rand(0,10) + $queen_skill->value;

            $results->push([
                'queen' => $queen,
                'score' => $total_score,
            ]);
        }
        $results = $results->sortBy('score',SORT_NUMERIC,'desc');

        $place = 0;
        $last_score = 0;
        foreach($results AS $result ) {
            if($last_score != $result['score']) {
                $place++;
            }

            // judgement based on score
                $judgement = 'safe';
                if($result['score'] > 10) $judgement = 'high';
                if($result['score'] < 5) $judgement = 'low';

            $this->queens()->create([
                'queen_id' => $result['queen']->id,
                'score' => $result['score'],
                'place' => $place,
                'judgement' => $judgement
            ]);
            $last_score = $result['score'];
        }

        return $this->queens;
    }
}
