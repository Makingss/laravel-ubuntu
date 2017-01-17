<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Goods_cat extends Model implements Sortable
{
    use SortableTrait;
    protected $primaryKey = 'cat_id';
    protected $fillable = ['parent_id', 'type_id', 'name', 'is_leaf', 'gallery_setting', 'disabled', 'p_order', 'goods_count', 'cat_path'];

    public $sortable = [
        'order_column_name' => 'p_order',
        'sort_when_creating' => true,
    ];

    public function Goods_types()
    {
        return $this->belongsTo(Goods_type::class, 'type_id');
    }
}
