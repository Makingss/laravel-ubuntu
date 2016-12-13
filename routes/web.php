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
Route::resource('mall','Mall\MallController');

