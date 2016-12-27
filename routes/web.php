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

Route::get('oauth/redirect', 'OauthController@redirect');
Route::get('callback', 'OauthController@oauth');
Route::get('oauth', 'OauthController@showClient');
Route::get('notification', 'Notification@showNotitfcation');
Route::get('generate', 'Notification@generate');
Route::get('/notification/is_read/{id}', 'Notification@is_read');
Route::get('/captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
    $captcha->create($config);
});
