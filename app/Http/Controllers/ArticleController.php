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
        $article = Article::all();
        return view('article.index')->with('article', $article);
    }
}
