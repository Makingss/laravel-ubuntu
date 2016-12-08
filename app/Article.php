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

    public function setPublishedAtAttribute($data)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $data);
    }
}
    