<?php

namespace App\Models;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Episode extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['number','season_id','description'];

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function challenges() {
        return $this->hasMany(EpisodeChallenge::class);
    }

    public function texts() {
        return $this->morphMany(ObjectText::class,'object');
    }

    public function stage_count() {
        return $this->texts()->max('order')->get();
    }

    public function queens() {
        return $this->hasMany(EpisodeQueen::class);
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

    // Eliminated
        public function getEliminatedAttribute() {
            return $this->queens->where('eliminated','-',1);
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



    public function getMiniChallengeAttribute() {
        return $this->challenges()->where('type','=','mini')->first();
    }
    public function getMainChallengeAttribute() {
        return $this->challenges()->where('type','=','main')->first();
    }

    public function newChallenge($type) {
        // Get challenge that hasn't been done this season
            $existing_challenges = ($this->season->challenges) ? $this->season->challenges->pluck('challenge_id') : [];
            $random_challenge = Challenge::whereNotIn('id',$existing_challenges)->inRandomOrder()->first();

        // Get theme that hasn't been done this season
            $existing_themes = ($this->season->themes) ? $this->season->themes->pluck('theme_id') : [];
            $random_theme = Theme::whereNotIn('id',$existing_themes)->inRandomOrder()->first();

        // Create Challenge
            $challenge = $this->challenges()->create([
                'season_id' => $this->season_id,
                'type' => $type,
                'challenge_id' => $random_challenge->id,
                'theme_id' => $random_theme->id,
            ]);
            $challenge->texts()->create(['stage'=>$type.'_challenge', 'text'=>"For this weeks $type challenge, the queens must perform in a $random_theme->name themed $random_challenge->name."]);

        // Get results
        $results = $challenge->results();



        // Mini Results
            if($type == 'mini') {
                if($challenge->winners->count() == 1) {
                    $winner = $challenge->winners[0]->queen;
                    $challenge->texts()->create(['stage'=>$type.'_challenge_results', 'text'=>"The winner is $winner->name!",'queen_ids'=>json_encode($winner->id)]);
                } else {
                    $winners = $challenge->winners->pluck('queen');
                    $names = $winners->pluck('name');
                    $challenge->texts()->create(['stage'=>$type.'_challenge_results', 'text'=>"It's a tie! $names[0] and $names[1] win the mini challenge!",'queen_ids'=>json_encode($winners->pluck('queen')->pluck('id'))]);
                }
            }

        // Main Results
            if($type == 'main') {
                $tops = $challenge->tops->pluck('queen');
                $names = Arr::join($tops->pluck('name')->toArray(), ', ', ' and ');
                $challenge->texts()->create(['stage'=>$type.'_challenge_results', 'text'=>"$names slayed the challenge!",'queen_ids'=>json_encode($tops->pluck('id'))]);

                $bottoms = $challenge->bottoms->pluck('queen');
                $names = Arr::join($bottoms->pluck('name')->toArray(), ', ', ' and ');
                $challenge->texts()->create(['stage'=>$type.'_challenge_results', 'text'=>"$names didn't perform well...",'queen_ids'=>json_encode($bottoms->pluck('id'))]);
            }

        return $results;

    }

    // Runways

    public function runways() {
        return $this->hasMany(Runway::class);
    }

    public function runway() {
        return $this->hasOne(Runway::class);
    }

    public function newRunway() {
        // Get category that hasn't been done this season
            $existing_categories = ($this->season->categories) ? $this->season->categories->pluck('category_id') : [];
            $random_category = Category::whereNotIn('id',$existing_categories)->inRandomOrder()->first();

        // Create Runway
            $runway = $this->runways()->create([
                'season_id' => $this->season_id,
                'category_id' => $random_category->id,
            ]);
            $runway->texts()->create(['stage'=>'runway', 'text'=>"The category is: $random_category->name."]);

        // Get results
            $results = $runway->results($this->queens);

            $tops = $runway->tops->pluck('queen');
            $names = Arr::join($tops->pluck('name')->toArray(), ', ', ' and ');
            $runway->texts()->create(['stage'=>'runway_results', 'text'=>"$names slayed the runway!",'queen_ids'=>json_encode($tops->pluck('id'))]);

            $bottoms = $runway->bottoms->pluck('queen');
            $names = Arr::join($bottoms->pluck('name')->toArray(), ', ', ' and ');
            $runway->texts()->create(['stage'=>'runway_results', 'text'=>"$names didn't perform well...",'queen_ids'=>json_encode($bottoms->pluck('id'))]);

        return $results;

        }




        public function score() {
            foreach($this->queens AS $queen) {
                $mini_score = $this->mini_challenge->queens()->where('queen_id','=',$queen->queen_id)->first()->score * 0.1;
                $main_score = $this->main_challenge->queens()->where('queen_id','=',$queen->queen_id)->first()->score;
                $queen->update(['score'=>$main_score+$mini_score]);
            }
            $results = $this->queens->sortBy('score',SORT_NUMERIC,'desc');

            $place = 0;
            $last_score = 0;
            foreach($results AS $queen ) {

                if($last_score != $queen->score) {
                    $place++;
                }
                $queen->update([
                    'score' => $queen->score,
                    'place' => $place,
                ]);

                $last_score = $queen->score;
            }

            $tops = $this->winners->pluck('queen');
            $names = Arr::join($tops->pluck('name')->toArray(), ', ', ' and ');
            $this->texts()->create(['stage'=>'deliberation', 'text'=>"$names condragulations, you are the winner of this week!",'queen_ids'=>json_encode($tops->pluck('id'))]);

            $bottoms = $this->losers->pluck('queen');
            $names = Arr::join($bottoms->pluck('name')->toArray(), ', ', ' and ');
            $this->texts()->create(['stage'=>'deliberation', 'text'=>"$names... I'm sorry my dears. You are up for elimination.",'queen_ids'=>json_encode($bottoms->pluck('id'))]);
        }

    public function lip_syncs() {
        return $this->hasMany(LipSync::class);
    }

    public function lip_sync() {
        return $this->hasOne(LipSync::class);
    }



    public function newlipSync($queens=[],$elimination = 1,$lalaparuza=false,$round=1) {
        // Get song that hasn't been done this season
            $existing_songs = ($this->season->lip_syncs) ? $this->season->lip_syncs->pluck('song_id') : [];
            $random_song = Song::whereNotIn('id',$existing_songs)->inRandomOrder()->first();

        // Create LipSync
            $lip_sync = $this->lip_syncs()->create([
                'season_id' => $this->season_id,
                'song_id' => $random_song->id,
                'is_lalaparuza' => $lalaparuza,
                'round' => $round,
            ]);
            $lip_sync->texts()->create(['stage'=>'lip_sync', 'text'=>"The bottom queens lip sync to $random_song->title by $random_song->artist."]);

        // Get results
            $results = $lip_sync->results($queens);

            if($elimination) {
                $count = count($queens);
                // All Queens Suck
                    if($results->where('judgement','=','low')->count() == $count) {
                        $losers = $this->losers->pluck('queen');
                        $lip_sync->texts()->create(['stage'=>'lip_sync', 'text'=>"None of the queens perform that well.",'queen_ids'=>json_encode($losers->pluck('id'))]);
                        if($results->max('score') - $results->min('score') < 2) {
                            $names = Arr::join($losers->pluck('name')->toArray(), '. ');
                            $this->texts()->create(['stage'=>'elimination', 'text'=>"$names. I'm sending you both home.",'queen_ids'=>json_encode($losers->pluck('id'))]);
                            $this->eliminate($queens);
                        } else {
                            $eliminated = $results->where('score','=',$results->min('score'));
                            $this->eliminate($eliminated->pluck('queen_id'));
                        }

                // All Queens Slay
                    } elseif($results->where('judgement','=','high')->count() == $count) {
                        $winners = $this->losers->pluck('queen');
                        $lip_sync->texts()->create(['stage'=>'lip_sync', 'text'=>"The queens put on a great show!",'queen_ids'=>json_encode($winners->pluck('id'))]);
                        if($results->max('score') - $results->min('score') < 2) {
                            $names = Arr::join($winners->pluck('name')->toArray(), '. ');
                            $this->texts()->create(['stage'=>'elimination', 'text'=>"$names. Shantay you both stay!",'queen_ids'=>json_encode($winners->pluck('id'))]);
                        } else {
                            $eliminated = $results->where('score','=',$results->min('score'));
                            $this->eliminate($eliminated->pluck('queen_id'));
                        }

                // There Can Only Be One
                    } else {
                        $winner = $results->where('score','=',$results->max('score'))->first()->queen;
                        $loser = $results->where('score','=',$results->min('score'))->first()->queen;
                        $lip_sync->texts()->create(['stage'=>'lip_sync', 'text'=>"$winner->name dominates the stage!",'queen_ids'=>json_encode([$winner->id])]);
                        $this->texts()->create(['stage'=>'elimination', 'text'=>"$winner->name. Shantay you stay!",'queen_ids'=>json_encode([$winner->id])]);
                        $this->texts()->create(['stage'=>'elimination', 'text'=>"$loser->name. Sashay away.",'queen_ids'=>json_encode([$loser->id])]);

                        $eliminated = $results->where('score','=',$results->min('score'));
                        $this->eliminate($eliminated->pluck('queen_id'));
                    }
                }
            return $results;
    }

    public function eliminate($queens=[]) {
        foreach($queens AS $queen) {
            echo "$queen eliminated\n";
            $this->queens()->where('queen_id','=',$queen)->update(['eliminated'=>1]);
            $this->season->queens()->where('queen_id','=',$queen)->update(['elimination_id'=>$this->id]);
        }
    }

}

