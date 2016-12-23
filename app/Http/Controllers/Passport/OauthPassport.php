<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2016/12/23
 * Time: 16:27
 */
namespace App\Http\Controllers;
class OauthPassport extends Controller
{
    public function showClient()
    {
       return view('passport.client');
    }
}