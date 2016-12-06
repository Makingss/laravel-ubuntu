<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        $article = App\Article::find(2);
//         $article->title = '';
//         $article->content = '';
//         $article->published_at = Carbon\Carbon::now();
           dump($article);
           //return view('article',compact('article'));
    }
}
