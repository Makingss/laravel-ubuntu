<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = [];

    public function Goods()
    {
        $this->belongsTo(Good::class, 'goods_id');
    }
}
