<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/9
 * Time: 14:40
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Goods_cat;
use App\Model\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class GoodsCatController extends Controller
{
    use ModelForm;

    public function index()
    {
        $content = Admin::content(function (Content $content) {
            $content->header('商品分类');
            $content->description('商品分类列表');
            $content->body($this->grid());
        });
        return $content;
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('编辑商品类型');
            $content->description('商品类型列表');
            $content->body($this->form()->edit($id));
        });

    }

    public function create()
    {

    }

    protected function grid()
    {
        $grid = Admin::grid(Goods_cat::class, function (Grid $grid) {
            $grid->cat_id('ID');
            $grid->type_id('类型')->value(function ($type_id) {
                return Goods_type::find($type_id)->name;
            });
            $grid->name('分类名称')->editable();
            $grid->is_leaf('是否为子节点')->value(function ($is_leaf) {
                return $is_leaf ? '是' : '否';
            });
            $states = [
                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
            ];
            $grid->disabled('隐藏')->switch($states);
            $grid->p_order('排序')->orderable();
            $grid->goods_count('商品数量');
            $grid->created_at('创建时间');
            $grid->created_at('最后更新时间');
        });
        return $grid;
    }

    protected function form()
    {
        return Admin::form(Goods_cat::class, function (Form $form) {
            $form->display('id');
            $form->select('type_id', '类型')->options(function () {
                $goods_types = Goods_type::all();
                foreach ($goods_types as $goods_type) {
                    $type_names = array_add([], $goods_type->cat_id, $goods_type->name);
                }
                return $type_names;
            });
            $form->text('name','分类名称');

        });

    }
}