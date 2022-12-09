<?php

namespace App\Models\Challenges;

use App\Models\Skills\Skill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeSkill extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['challenge_id','skill_id','weight'];

    public function challenge() {
        return $this->belongsTo(Challenge::class);
    }

    public function skill() {
        return $this->belongsTo(Skill::class);
    }
}
