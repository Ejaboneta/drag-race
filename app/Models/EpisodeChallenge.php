<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeChallenge extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','season_id','episode_id','challenge_id','type','theme_id'];

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function episode() {
        return $this->belongsTo(Episode::class);
    }

    public function challenge() {
        return $this->belongsTo(Challenge::class);
    }

    public function queens() {
        return $this->hasMany(EpisodeChallangeQueen::class);
    }

    public function texts() {
        return $this->morphMany(ObjectText::class,'object');
    }

    // Bottoms
        public function getBottomsAttribute() {
            $max = ($this->queens->count() > 4) ? 2 : 1;
            $last = $this->queens->max('place');
            return $this->queens->where('place','>=',$last-$max);
        }

    // Losers
        public function getLosersAttribute() {
            $last = $this->queens->max('place');
            return $this->queens->where('place','>=',$last-1);
        }

    // Tops
        public function getTopsAttribute() {
            $max = ($this->queens->count() > 4) ? 3 : 2;
            return $this->queens->where('place','<=',$max);
        }

    // Winners
        public function getWinnersAttribute() {
            return $this->queens->where('place','=',1);
        }



    public function results() {
        if($this->queens()->exists()) { // Don't redo the challenge
            return $this->queens;
        }

        $results = collect();
        $skills = $this->challenge->skills;
        $rand_weight = 100 / ($skills->count() + 1);
        $queens = $this->episode->queens;
        foreach($queens AS $q) {
            $queen = $q->queen;
            $total_score = 0;
            // score for each skill
                foreach($skills AS $skill) {
                    $queen_skill = $queen->skills()->where('skill_id','=',$skill->skill_id)->first()['value'];
                    $total_score += $queen_skill;
                }
            $total_score += rand(0,$rand_weight);
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
            $this->queens()->create([
                'queen_id' => $result['queen']->id,
                'score' => $result['score'],
                'place' => $place,
            ]);

            $last_score = $result['score'];
        }

        return $this->queens;
    }

}
