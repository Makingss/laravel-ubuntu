<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $fillable = ['jooge_goods_id', 'bn', 'name', 'type_id', 'cat_id', 'brand_id', 'marketable', 'store', 'fav',
        'notify_num', 'uptime', 'downtime', 'p_order', 'p_vstore', 'd_order', 'd_vstore', 'score', 'cost_price', 'mkt_price',
        'price', 'member_price', 'activity_price', 'weight', 'g_weight', 'unit', 'brief', 'goods_type', 'image_default_id',
        'udfimg', 'thumbnail_pic', 'small_pic', 'big_pic', 'pic_id', 'intro', 'store_place', 'min_buy', 'package_scale', 'package_unit',
        'package_use', 'store_prompt', 'nostore_sell', 'goods_setting', 'spec_desc', 'params', 'visit_count', 'comments_count',
        'view_w_count', 'view_count', 'count_stat', 'buy_count', 'buy_w_count', 'barcode', 'is_line', 'fx_1_price', 'fx_2_price',
        'fx_3_price', 'goods_status', 'modify_status', 'price_modify', 'good_form', 'buy_limit', 'taxrate', 'tip_id', 'pmt_tag',
        'pmt_id', 'goods_profit_ratio', 'is_pkg', 'pkg_info'
    ];
    protected $primaryKey = 'goods_id';

    public function Goods_types()
    {
        return $this->belongsTo(Goods_type::class, 'type_id');
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'goods_id');
    }
    /**
     * One To Many
     * Goods To Goods_lv_price
     * Goods.goods_id To Goods_lv_price.goods_id
     */
    public function goods_lv_price(){
        return $this->hasMany(Goods_lv_price::class,'goods_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * One To Many
     *Good.goods_id To Member_goods.goods_id
     */
    public function member_goods(){
        return $this->hasMany(Member_good::class,'goods_id');
    }
}
