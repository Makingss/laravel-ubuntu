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
    
        return view('articles.create');
    }
    public function store(Request $request){
        dd($request->all());
        //接收POST数据
        //保存到数据库
        //重定向
        $input=$request->all();
        $input['published_at']=Carbon::now();
        Article::create($input);
        return redirect('/articles');
    }
}
