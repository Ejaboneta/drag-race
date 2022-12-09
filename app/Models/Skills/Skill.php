<?php

namespace App\Models\Skills;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name'];
}
