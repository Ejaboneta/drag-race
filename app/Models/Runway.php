<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Runway extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['season_id','episode_id','category_id'];

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
        return $this->hasMany(RunwayQueen::class);
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


    public function results($queens=[]) {
        $skill = Skill::where('name','=','Runway')->first();
        $results = collect();
        foreach($queens AS $loser) {
            $queen = $loser->queen;
            $queen_skill = $queen->skills()->where('skill_id','=',$skill->id)->first();
            $total_score = rand(0,50) + $queen_skill->value;

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
