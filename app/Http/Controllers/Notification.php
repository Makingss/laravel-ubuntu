<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNotitfcation()
    {
        notify(new \App\Notifications\UserSubScribe());
    }
}
