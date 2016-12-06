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
        $article = Article::find(1);
        return view('articles.index',compact('article'));
    }
}
