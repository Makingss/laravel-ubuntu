<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon;

class ArticleController extends Controller
{

    public function index()
    {
        //$article = App\Article::find(2);
        //$article->title = '';
        //$article->content = '';
        //$article->published_at = Carbon\Carbon::now();
           //return view('article',compact('article'));
	$name='<span style="color:red"> Making</span>';
        $fisrt = ['making','master','wuyanping'];
        
	$last = 'master';
        return view('sites.content',compact('fisrt','last','name'));
    }
}
