<?php

#namespace App\Http\Controllers;
namespace App\Admin\Controllers;

use App\Painter;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Encore\Admin\Widgets\Tab;

class PainterController extends Controller
{
    use ModelForm;



    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    protected function grid()
    {
        $grids = \Encore\Admin\Facades\Admin::grid(Painter::class, function (Grid $grid) {
            $grid->id('id')->sortable();
            $grid->username('姓名')->editable();
            $grid->paintings()->pluck('title')->map(function ($title) {
                return "<strong><i>$title</i></strong>";
            })->implode('<br/>');
            $grid->created_at();
            $grid->updated_at();
        });
        return $grids;
    }

    protected function form()
    {
        return \Encore\Admin\Facades\Admin::form(Painter::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('username')->rules('required');
            $form->textarea('bio')->rules('required');
            $form->hasMany('paintings', function (Form\NestedForm $form) {
                $form->text('title')->rules('required');
                $form->textarea('body')->rules('required');
                $form->datetime('completed_at');
            });

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

    public function edit($id)
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * update interface.
     *
     * @return Content
     */
//    public function update()
//    {
////        $this->validate($request, ['username' => 'required|min:3', 'bio' => 'required']);
////        $painter = Painter::findOrFail($id);
////        $painter->update($request->all());
//        return \Encore\Admin\Facades\Admin::content(function (Content $content) {
//
//            $content->header('header');
//            $content->description('description');
//
//            $content->body($this->form()->update());
//        });
//    }
    /**
     * @param $id
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
//        if (Request::input('painter_id') == $id) {
//            throw new \Exception(trans('admin::lang.parent_select_error'));
//        }

        return $this->form()->update($id);
    }
    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return \Encore\Admin\Facades\Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

}
