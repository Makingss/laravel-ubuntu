<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Painting extends Model
{
    protected $fillable = ['painter_id', 'title', 'body'];

    public function painter()
    {
        return $this->belongsTo(Painter::class, 'painter_id');
    }
}
