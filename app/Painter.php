<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painter extends Model
{
    public function Paintings()
    {
        return $this->hasMany(Painting::class, 'painter_id');
    }
}
