<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SkillBonus extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','queen_id','season_id','episode_id','skill_id',];
}
