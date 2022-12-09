<?php

namespace App\Models\LipSyncs;

use App\Models\ObjectText;
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
