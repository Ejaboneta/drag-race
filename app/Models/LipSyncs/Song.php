<?php

namespace App\Models\LipSyncs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['title','artist'];
}
