<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use GuzzleHttp\Client;

class OauthController extends Controller
{
    protected $http;

    public function __construct(Client $http)
    {
        $this->http=$http;
    }

    public function oauth(Request $request)
    {
        $response = $this->http->post('http://192.168.254.128/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => 'W8IuK4Ighp56qNGnweMiY0NsmYswhSusy4L1aEF9',
                'redirect_uri' => 'http://192.168.254.128/callback',
                'code' => $request->code,
            ],
        ]);
        $access_token = Arr::get(json_decode((string)$response->getBody(), true), 'access_token');
        return $this->getUserByToken($access_token);
    }

    private function getUserByToken($accessToken)
    {
        $heades = ['Authorization' => 'Bearer' . $accessToken];
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://192.168.254.128/api/user', $heades);
        $response = $this->http->send($request);
        return json_decode((string)$response->getBody(), true);

    }

    public function showClient()
    {
        return view('passport.client');
    }
}

