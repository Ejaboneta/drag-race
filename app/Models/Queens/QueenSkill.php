<?php

namespace App\Models\Queens;

use App\Models\Skills\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueenSkill extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['queen_id','skill_id','value'];

    public function queen() {
        return $this->belongsTo(Queen::class);
    }
    public function attribute() {
        return $this->belongsTo(Skill::class);
    }
}
