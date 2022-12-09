<?php

namespace App\Models\Queens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Queen extends Model
{
    use SoftDeletes;
    protected
        $with = ['skills'],
        $fillable = ['name','user_id','image_url'];

    public function skills() {
        return $this->hasMany(QueenSkill::class);
    }
}
