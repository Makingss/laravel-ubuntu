<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;

class OauthController extends Controller
{
    public function oauth(Request $request)
    {
        $http = new \GuzzleHttp\Client();
        $response = $http->post('http://192.168.254.128/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => 'W8IuK4Ighp56qNGnweMiY0NsmYswhSusy4L1aEF9',
                'redirect_uri' => 'http://192.168.254.128/callback',
                'code' => $request->code,
            ],
        ]);
        #dd($response);
        $access_token = Arr::get(json_decode((string)$response->getBody(), true), 'access_token');
        return $this->getUserByToken($access_token);
    }

    private function getUserByToken($accessToken)
    {
        $http = new \GuzzleHttp\Client();
        $heades = ['Authorization' => 'Bearer' . $accessToken];
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://192.168.254.128/api/user', $heades);
        $response = $http->send($request);
        return json_decode((string)$response->getBody(), true);

    }

    public function showClient()
    {
        return view('passport.client');
    }
}

