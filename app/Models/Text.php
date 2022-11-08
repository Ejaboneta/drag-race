<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Text extends Model
{
    use SoftDeletes;
    protected
        $fillable = ['object_type','stage','text'];

    public static function generate($object_type,$stage,$queens=[],$used_ids=[]) {
        // Get Queens
            $queens = Queen::findMany($queens);
            echo "$object_type $stage \n";


        // Find Text options
            $options = Text::where('object_type','=',$object_type)
                ->where('queen_count','<=',$queens->count())
                ->whereNotIn('id',$used_ids)
                ->where('stage','=',$stage)
                ->get();

        if($options->count() == 0) {
            return false;
        }

        // Pick a random option
            $rand = $options->random();
            $used_ids[] = $rand->id;
            $text = $rand->text;

        // Fill in Queen names
            $used_queens = [];
            $selected = $queens->random($rand->queen_count);
            foreach($selected AS $k => $q) {
                $text = Str::replace("<queen_$k>",$q->name,$text);
                $used_queens[] = $q->id;
            }

        return [
            'stage' => $stage,
            'text' => $text,
            'queen_ids' => json_encode($used_queens),
            'used_ids' => $used_ids
        ];
    }
}
