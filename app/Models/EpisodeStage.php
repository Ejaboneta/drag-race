<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeStage extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','relationship','order','image'];

    public function parts() {
        return $this->hasMany(EpisodeStagePart::class);
    }
}
