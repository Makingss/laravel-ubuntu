<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/8
 * Time: 20:02
 */
namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Goods_type;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class GoodsTypeController extends Controller
{
    use ModelForm;

    public function index()
    {
        $content = Admin::content(function (Content $content) {
            $content->header('商品类型');
            $content->description('商品类型列表');
            $content->body($this->grid());

        });
        return $content;
    }

    public function edit()
    {

    }

    public function create()
    {

    }

    protected function grid()
    {
        $grid = Admin::grid(Goods_type::class, function (Grid $grid) {
            $grid->type_id('type_id');
            $grid->name('类型名称')->editable();
            $grid->type_alias('别名')->value(function ($type_alias) {
                return \GuzzleHttp\json_decode($type_alias);
            })->label();
            $grid->is_physical('实体商品')->value(function ($is_physical) {
                return $is_physical ? '是' : '否';
            });
            $grid->schema_id('供应商编码')->editable();
            $grid->created_at('创建时间');
            $grid->updated_at('最后更新时间');

        });
        return $grid;

    }

    protected function form()
    {

    }
}