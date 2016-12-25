<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserSubScribe;
class Notification extends Controller
{
    public function __construct()
    {
        //如果用户没有登录,重定向到login,成功登录后返回当前页面
        if(Auth::check() == false){
            return Redirect::guest('login');
        }
    }

    public function showNotitfcation()
    {
         Auth::user()->notify(new UserSubScribe());
    }
}
