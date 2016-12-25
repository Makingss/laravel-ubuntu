<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{
    protected $user;

    public function __construct(Auth $user)
    {
        $this->user = $user;
    }

    public function showNotitfcation()
    {
        dd($this->user);
        $this->user->notify(new \App\Notifications\UserSubScribe());
    }
}
