<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods_cat extends Model
{
    protected $primaryKey = 'cat_id';
    protected $fillable = ['parent_id', 'type_id', 'name', 'is_leaf', 'gallery_setting', 'disabled', 'p_order', 'goods_count', 'cat_path'];

    public function Goods_types()
    {
        return $this->belongsTo(Goods_type::class, 'type_id');
    }
}
