<?php

use Illuminate\Routing\Router;

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'IndexController@index');
    $router->post('/fileupload','ToolsbaseController@fileUpload');
    $router->resource('/painter', 'PainterController');
    $router->resource('/goods', 'GoodsController');
    $router->resource('/goodstype','GoodsTypeController');
    $router->resource('goodscat','GoodsCatController');
    $router->resource('/articles','ArticleController');
    $router->resource('/wangeditor','WangEditorController');


});

