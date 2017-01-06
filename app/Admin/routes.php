<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');

});

$router = app('admin.router');
$router->resource('/painter', 'PainterController');
$router->resource('/goods', 'GoodsController');
//$router->get('/painter','PainterController@index');
//$router->get('/painter/{id}','PainterController@create');
//$router->get('/painter/{id}/edit','PainterController@edit');
