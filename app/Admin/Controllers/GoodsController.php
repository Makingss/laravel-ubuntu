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
use App\Model\Goods_cat;
use App\Model\Goods_type;
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
            $grid->goods_id('id');
            //$grid->jooge_goods_id()->sortable();
            $grid->bn('编码')->editable();
            $grid->name('名称')->editable();
            $states = [
                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
            ];
            $grid->marketable('上架')->switch($states);
            $grid->type_id('类型名称')->value(function ($type_id) {
                return Goods_type::find($type_id)->name;
            });
            $grid->cat_id('分类名称')->value(function ($cat_id) {
                return Goods_cat::find($cat_id)->name;
            });
            $grid->created_at();
            $grid->updated_at();
        });
    }

    protected function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('商品信息');
            $content->description('商品信息列表');
            $content->body($this->form()->edit($id));
        });

    }

    protected function form()
    {
        return Admin::form(Good::class, function (\Encore\Admin\Form $form) {
            $form->display('goods_id', 'id');
            $form->text('bn', '编码')->rules('required');
            $form->text('name', '名称')->rules('required');
            //[1 => 'foo', 2 => 'bar', 'val' => 'Option name']
            $form->select('type_id', "类型")->options(function () {
                $goods_types = Goods_type::all();
                foreach ($goods_types as $goods_type) {
                    $type_name = array_add([], $goods_type->type_id, $goods_type->name);
                }
                return $type_name;
            });
            $form->select('cat_id', '分类')->options(function () {
                $goods_cats = Goods_cat::all();
                foreach ($goods_cats as $goods_catK => $goods_cat) {
                    $cat_name[] = array_add([], $goods_cat->cat_id, $goods_cat->name);
                }
                foreach ($cat_name as $cat_name => $cat_nameV) {
                    foreach ($cat_nameV as $key => $val) {
                        $new_arr[$key] = $val;
                    }
                }
                return $new_arr;
            });
            $form->switch('marketable');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '最后更新时间');
        });
    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建商品');
            $content->description('新建货品列表');
            $content->body($this->form());
        });
    }

    public function update($id)
    {
//        if (Request::input('painter_id') == $id) {
//            throw new \Exception(trans('admin::lang.parent_select_error'));
//        }

        return $this->form()->update($id);
    }
}
