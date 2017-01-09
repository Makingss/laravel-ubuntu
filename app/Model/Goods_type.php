<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods_type extends Model
{
    protected $fillable = ['name', 'type_alias', 'is_physical', 'schema_id', 'setting',
        'price', 'minfo', 'params', 'tab', 'dly_func', 'ret_func', 'reship', 'disabled', 'is_def',
        'schema_lastmodify'
    ];

    protected $primaryKey = 'type_id';

    public function Goods()
    {
        return $this->hasOne(Good::class, 'type_id');
    }
}
