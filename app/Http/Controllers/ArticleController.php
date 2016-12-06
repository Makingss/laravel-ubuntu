<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        $article = new App\Article;
        $articleData = $article::all();
        // $article->title = '';
        // $article->content = '';
        // $article->published_at = Carbon\Carbon::now();
        // return view('article',compact('article'));
        
        return ($articleData);
    }
}
