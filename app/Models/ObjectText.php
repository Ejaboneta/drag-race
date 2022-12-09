<?php

namespace App\Models;

use App\Models\Episodes\EpisodeStagePart;
use App\Models\Queens\Queen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObjectText extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['object_type','episode_stage_part_id','stage','text','queen_ids'],
        $appends = ['queens'];

    public function getQueensAttribute() {
        $array = json_decode($this->attributes['queen_ids']);
        return Queen::findMany($array);
    }

    public function episode_stage_part() {
        return $this->belongsTo(EpisodeStagePart::class);
    }
}
