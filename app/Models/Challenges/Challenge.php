<?php

namespace App\Models\Challenges;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name'];

    public function skills() {
        return $this->hasMany(ChallengeSkill::class);
    }
}
