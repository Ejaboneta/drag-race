<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeStagePart extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','slug','episode_part','order'];

    public function stage() {
        return $this->belongsTo(EpisodeStage::class);
    }
}
