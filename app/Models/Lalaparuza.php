<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lalaparuza extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['name'];


    public function texts() {
        return $this->morphMany(ObjectText::class,'object');
    }
}
