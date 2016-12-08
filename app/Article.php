<?php
namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    /**
     * @param $data
     * 使用了setAttribute
     */
    public function setPublishedAtAttribute($data)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $data);
    }

    /**
     * @param $query
     * 使用了QueryScope
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }
}
    