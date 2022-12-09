<?php

namespace App\Models\Episodes;

use App\Models\ObjectText;
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

    public function texts() {
        return $this->hasMany(ObjectText::class);
    }
}
