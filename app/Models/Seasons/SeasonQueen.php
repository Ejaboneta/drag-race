<?php

namespace App\Models\Seasons;

use App\Models\Episodes\Episode;
use App\Models\Queens\Queen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SeasonQueen extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['queen_id','season_id','elimination_id','place',],
        $with = ['queen','elimination'];

    public function season() {
        return $this->belongsTo(Season::class);
    }

    public function queen() {
        return $this->belongsTo(Queen::class);
    }

    public function elimination() {
        return $this->belongsTo(Episode::class);
    }
}
