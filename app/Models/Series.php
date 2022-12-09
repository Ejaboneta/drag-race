<?php

namespace App\Models;

use App\Models\Seasons\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name','user_id'];

    public function seasons() {
        return $this->hasMany(Season::class);
    }
}
