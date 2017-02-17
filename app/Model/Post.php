<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body'];
    public function comments()
    {
        return $this->morphMany(\App\Model\Comment::class, 'commentable');
    }
}
