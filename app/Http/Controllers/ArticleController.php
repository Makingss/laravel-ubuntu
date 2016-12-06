<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon;
use App\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $article=Article::all();
        // $article->title = '';
        // $article->content = '';
        // $article->published_at = Carbon\Carbon::now();
        // return view('article',compact('article'));
        return $article;
    }
}
