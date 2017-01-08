<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = [];

    public function goods()
    {
        $this->belongsTo(Good::class, 'goods_id');
    }
}
