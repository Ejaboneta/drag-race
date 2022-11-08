<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LipSyncQueen extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['lip_sync_id','queen_id','score','place','judgement'];

        public function lip_sync() {
            return $this->belongsTo(LipSync::class);
        }

        public function queen() {
            return $this->belongsTo(Queen::class);
        }

        public function quotes() {
            return $this->morphMany(Quote::class,'object');
        }

}
