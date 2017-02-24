<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/1/6
 * Time: 22:00
 */
namespace App\Admin\Controllers;

use App\Admin\Models\Brand;
use App\Http\Controllers\Controller;
use App\Admin\Models\Good;
use App\Admin\Models\Goods_cat;
use App\Admin\Models\Goods_type;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Http\Request;

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
            $grid->goods_id('id')->sortable();
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
                return Goods_cat::find($cat_id)->cat_name;
            });
            $grid->created_at();
            $grid->updated_at();
        });
    }

    protected function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
//            dd($content);
            $content->header('商品信息');
            $content->description('商品信息列表');
            $content->body($this->form()->edit($id));
        });

    }

    protected function form()
    {
        return Admin::form(Good::class, function (\Encore\Admin\Form $form) {
            $states = [
                'on' => ['value' => 1, 'text' => 'YES', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'NO', 'color' => 'danger'],
            ];
            $form->display('goods_id', 'id');
            $form->hidden('jooge_goods_id', '商品ID')->md5(time() . mt_rand(1, 1000000));
            //[1 => 'foo', 2 => 'bar', 'val' => 'Option name']
            $form->select('type_id', "类型")->options(function () {
                $goods_types = Goods_type::all();
                foreach ($goods_types as $goods_type) {
                    $type_name[] = array_add([], $goods_type->type_id, $goods_type->name);
                }
                foreach ($type_name as $type_nameK => $type_nameV) {
                    foreach ($type_nameV as $key => $value) {
                        $new_arr[$key] = $value;
                    }
                }
                return $new_arr;
            });
            $form->select('cat_id', '分类')->options(function () {
                $goods_cats = Goods_cat::all();
                foreach ($goods_cats as $goods_catK => $goods_cat) {
                    $new_arr[$goods_cat->cat_id] = $goods_cat->cat_name;
                }
//                foreach ($cat_name as $cat_namek => $cat_nameV) {
//                    foreach ($cat_nameV as $key => $value) {
//                        $new_arr[$key] = $value;
//                    }
//                }
                return $new_arr;
            });
            $form->text('bn', '商品编码')->rules('required');
            $form->text('name', '商品名称')->rules('required');
            $form->select('brand_id', '品牌')->options(function () {
                $brands = Brand::all();
                foreach ($brands as $brandK => $brandV) {
                    $new_arr[$brandV->brand_id] = $brandV->brand_name;
                }
                return $new_arr;
            });
            $form->switch('marketable', '是否上架')->states($states);
            $form->text('p_order', '排序');
            $form->fileinput('image_default_id', '商品相册');
            $form->editor('详细介绍');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '最后更新时间');
        });
    }

    public function delete()
    {

    }

    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('新建商品');
            $content->description('新建货品列表');
//            dd($this->form());
            $content->body($this->form());
        });
    }

    public function store(Request $request)
    {
        $this->validate($request, ['bn' => 'required|min:3', 'name' => 'required|min:1']);
        $input = $request->all();
        Good::create($input);
    }

    public function update(Request $request, $id)
    {
        $goodsObj = Good::findOrFail($id);
        $fileupload = new ToolsbaseController();
        $imagePath = json_decode($fileupload->fileUpload($request), true);
//        var_dump($imagePath);die();
        $goods_datas = $request->all();
        if ($goods_datas['marketable'] == 'off')
            $goods_datas['marketable'] = 0;
        else
            $goods_datas['marketable'] = 1;
        $goods = array_add($goods_datas, 'image_default_id', $imagePath['path']);
//        dd($goods);
        $goodsObj->update($goods);
        return redirect('/admin/goods');
    }
}
