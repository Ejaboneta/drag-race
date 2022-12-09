<?php

namespace App\Models\Episodes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeStage extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','episode_id','order','image'];

    public function episode() {
        return $this->belongsTO(Episode::class);
    }

    public function parts() {
        return $this->hasMany(EpisodeStagePart::class);
    }
}
