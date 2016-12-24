<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/users', function () {
        return '我是管理员，我有授权！';
    });
});
Route::get('/', 'SitesController@index');
Route::get('/about', 'SitesController@about');
Route::get('content', 'SitesController@content');
/*
Route::get('/articles','ArticleController@index');
Route::get('/articles/create','ArticleController@create');
Route::get('/articles/{id}','ArticleController@show');
Route::post('/articles','ArticleController@store');
*/

Route::resource('articles', 'ArticleController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('mall', 'Mall\MallController');

Route::get('oauth/redirect', function () {
    $query = http_build_query([
        'client_id' => 3,
        'redirect_uri' => 'http://192.168.254.128/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://192.168.254.128/oauth/authorize?' . $query);
});
Route::get('callback', 'OauthController@oauth');
Route::get('oauth', 'OauthController@showClient');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
