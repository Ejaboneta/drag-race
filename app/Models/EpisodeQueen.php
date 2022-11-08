<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeQueen extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['season_id','episode_id','queen_id','score','place','eliminated'];


        public function season() {
            return $this->belongsTo(Season::class);
        }

        public function episode() {
            return $this->belongsTo(Episode::class);
        }

        public function queen() {
            return $this->belongsTo(Queen::class);
        }
}
