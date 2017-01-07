<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Good;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;

class GoodsController extends Controller
{
    use ModelForm;

    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('商品信息');
            $content->description('商品信息列表');
            $content->body($this->grid());
        });
    }

    public function grid()
    {
        return Admin::grid(Good::class, function (Grid $grid) {
            $grid->goods_id('goods_id');
            //$grid->jooge_goods_id()->sortable();
            $grid->bn('编码')->editable();
            $grid->name('名称')->editable();
            $states = [
                'on' => ['text' => 'YES'],
                'off' => ['text' => 'NO'],
            ];
            $grid->marketable('上架')->switch($states);
            $grid->created_at();
            $grid->updated_at();
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('商品信息');
            $content->description('商品信息列表');
            $content->body($this->form()->edit($id));
        });

    }

    public function form()
    {
        return Admin::form(Good::class, function (\Encore\Admin\Form $form) {
            $form->display('id', 'id');
            $form->text('bn')->rules('required');
            $form->text('name')->rules('required');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}