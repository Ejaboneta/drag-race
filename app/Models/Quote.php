<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['object_type','object_id','timing','quote'];

    public function object() {
        return $this->morphTo();
    }
}
