<?php

namespace App\Http\Controllers;

use App\Events\UserSignUp;
use App\Notifications\UserMailPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::User();
        $user->notify(new UserMailPublished($user));
        #event(new UserSignUp($user));
        return view('home');
    }
}
