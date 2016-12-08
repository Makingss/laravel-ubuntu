<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        #$article = Article::latest()->where('published_at','<=',Carbon::now())->get();
        $article = Article::latest()->published()->get();
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
        #$article = $article->published_at->diffForHumans();
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

        return view('articles.create');
    }

    public function store(Request $request)
    {
        //接收POST数据
        //保存到数据库
        //重定向
        $this->validate($request, ['title' => 'required|min 3', 'content' => 'required', 'published_at' => 'required']);
        $input = $request->all();
        Article::create($input);
        return redirect('/articles');
    }
}
