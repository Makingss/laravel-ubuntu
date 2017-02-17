<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods_keyword extends Model
{
    protected $fillable = ['goods_id', 'keyword', 'refer', 'res_type', 'last_modify'];

//    public function goods()
//    {
//        return $this->morphedByMany('App\Model\Good', 'keyword');
//    }
}
