<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    public function getArticle()
    {
        $article = Article::all();
        dump($article->title);
    }
}
    