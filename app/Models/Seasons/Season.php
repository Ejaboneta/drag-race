<?php

namespace App\Models\Seasons;

use App\Models\Episodes\Episode;
use App\Models\Episodes\EpisodeChallenge;
use App\Models\Episodes\EpisodeQueen;
use App\Models\LipSyncs\LipSync;
use App\Models\ObjectText;
use App\Models\Text;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Season extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','series_id','episode_id','status','total_episodes'];

    public function series() {
        return $this->hasMany(SeasonQueen::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
    }

    public function challenges() {
        return $this->hasMany(EpisodeChallenge::class);
    }
    public function lip_syncs() {
        return $this->hasMany(LipSync::class);
    }

    public function queens() {
        return $this->hasMany(SeasonQueen::class);
    }

    public function eliminated() {
        return $this->hasMany(SeasonQueen::class)->whereNotNull('elimination_id');
    }

    public function active() {
        return $this->hasMany(SeasonQueen::class)->whereNull('elimination_id');
    }

    public function texts() {
        return $this->morphMany(ObjectText::class,'object');
    }

    public function nextEpisode() {

        // Create Episode
            $count = $this->episodes->count();
            $number = $count+1;
            $episode = $this->episodes()->create(['number'=>$number]);

        // Queens
            foreach($this->queens()->whereNull('elimination_id')->get() AS $queen) {
                $episode->queens()->create([
                    'season_id' => $this->id,
                    'queen_id' => $queen->id
                ]);
            }

        // Starting Text
            if($number==1) {
                $episode->texts()->create([
                    'stage'=>'first_episode',
                    'text'=> $this->queens->count().' queens enter the the werq room for the first time. But only one will be crowned the next drag superstar.'
                ]);
                $episode->update(['description'=>$this->queens->count().' queens enter the the werq room for the first time. But only one will be crowned the next drag superstar.']);
                $used_ids = [];
                foreach($this->queens AS $queen) {
                    $text = (array) Text::generate(Episode::class,'entrance',[$queen->id],$used_ids);
                    $used_ids = $text['used_ids'];
                    if($text) {
                        $episode->texts()->create($text);
                    }
                }
            } else{
                $text = Text::generate(Episode::class,'opening',$this->queens->pluck('queen_id'));
                if($text) {
                    $episode->texts()->create((array) $text);
                }
            }

        // Mini Challenge
            $mini = $episode->newChallenge('mini');

        // Main Challenge
            $main = $episode->newChallenge('main');

        // Werq Room
            $episode->texts()->create([
                'stage'=>'werq_room_intro',
                'text' => 'In the werq room, the queens get ready for the runway.'
            ]);

            $rand = rand(2,4);
            $used_ids = [];
            for($n=1;$n<=$rand;$n++) {
                $text = (array) Text::generate(Episode::class,'werq_room',$episode->queens->pluck('queen_id'),$used_ids);
                $episode->texts()->create($text);
            }

        // Runway
            $episode->newRunway();

        // Judging
            $episode->score();

        // Lip Sync
            $lip_sync = $episode->newLipSync($episode->losers);

        // Rank Queens
            $place = $this->queens->count();
            foreach($this->eliminated()->orderBy('elimination_id')->get() AS $eliminated) {
                echo "$eliminated->elimination_id | $place\n";
                $eliminated->update(['place'=>$place]);
                $place--;
            }

            $marks = [];
            foreach($this->active AS $active) {
                $get = EpisodeQueen::where('season_id','=',$this->id)->where('queen_id','=',$active->queen_id)->get();
                $marks[$active->queen_id] = $get->sum('place');
            }
            arsort($marks);

            foreach($marks AS $id=>$mark) {
                $queen = $this->queens()->where('queen_id','=',$id)->update(['place'=>$place]);
                $place--;
            }
    }
}
