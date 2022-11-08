<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RunwayQueen extends Model
{
    use SoftDeletes;
    protected
        $fillable = [
            'runway_id',
            'queen_id',
            'score',
            'place',
        ];

    public function runway() {
        return $this->belongsTo(Runway::class);
    }
    public function queen() {
        return $this->belongsTo(Queen::class);
    }
}
