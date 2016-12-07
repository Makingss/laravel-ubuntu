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
        return view('articles.index', compact('article'));
    }

    /**
     * show
     */
    public function show($id)
    {
        /**
         * find()
         * findOrFail()
         */
        $article = Article::findOrFail($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * update article
     */
    public function update()
    {

    }

    /**
     * create article
     */
    public function create()
    {
        return 'articlesc.reate';
    }
}
