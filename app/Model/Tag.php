<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function goods(){
        return $this->morphedByMany(Good::class,'taggable','taggables');
    }
}
