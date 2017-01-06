<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;

class GoodsController extends Controller
{

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('商品信息');
            $content->description('商品信息列表');
            $content->body('fdfafdsa');
        });
    }
}