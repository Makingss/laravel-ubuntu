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
            $grid->username()->editable();
            $grid->paintings()->pluck('title')->map(function ($title) {
                return "<strong><i>《$title》</i></strong>";
            })->implode('<br />');

            $grid->created_at();
            $grid->updated_at();
        });
        return $grids;
    }

    protected function form()
    {
        return Admin::form(Painter::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('username')->rules('required');
            $form->textarea('bio')->rules('required');
            $form->hayMany('paintings', function (Form\NestedForm $form) {
                $form->text('title');
                $form->textarea('body');
                $form->datatime(completed_at);
            });
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }

}
