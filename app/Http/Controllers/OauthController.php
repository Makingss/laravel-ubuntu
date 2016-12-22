<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OauthController extends Controller
{
    public function oauth(Request $request)
    {
        $http = new GuzzleHttp\Client;
        $response = $http->post('http://passport.dev/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => 'W8IuK4Ighp56qNGnweMiY0NsmYswhSusy4L1aEF9',
                'redirect_uri' => 'http://passport-client.dev/callback',
                'code' => $request->code,
            ],
        ]);

        return json_decode((string)$response->getBody(), true);
    }
}

