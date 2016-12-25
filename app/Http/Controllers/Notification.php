<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserSubScribe;
class Notification extends Controller
{
//    protected $user;
//
//    public function __construct(Auth $user)
//    {
//        $this->user = $user;
//    }

    public function showNotitfcation()
    {
        Auth::user()->notify(new UserSubScribe());
    }
}
