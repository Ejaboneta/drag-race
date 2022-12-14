<?php

namespace App\Models\Queens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QueenPhoto extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name'];
}
