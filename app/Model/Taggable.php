<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Taggable extends Model
{
    protected $fillable=['taggable_id','taggable_type','created_at','updated_at'];
}
