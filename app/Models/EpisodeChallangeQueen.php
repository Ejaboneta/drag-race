<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeChallangeQueen extends Model
{
    use SoftDeletes;
    protected
        $fillable = [
            'episode_challenge_id',
            'queen_id',
            'score',
            'place',
        ];

    public function episode_challenge() {
        return $this->belongsTo(EpisodeChallenge::class);
    }
    public function queen() {
        return $this->belongsTo(Queen::class);
    }
}
