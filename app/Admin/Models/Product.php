<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = [];

    public function Goods()
    {
        return $this->belongsTo(Good::class, 'goods_id');
    }

    /**
     * One To Many
     * Product To Goods_lv_price
     * Product.product_id To Goods_lv_price
     */
    public function goods_lv_prices()
    {
        return $this->hasMany(Goods_lv_price::class, 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * One To Many
     * Product.product_id To Member_good.product_id
     */
    public function member_goods()
    {
        return $this->hasMany(Member_good::class, 'product_id');
    }
}
