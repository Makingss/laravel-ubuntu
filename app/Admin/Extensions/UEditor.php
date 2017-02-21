<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/19
 * Time: 11:05
 */

namespace App\Admin\Extensions;

@include('vendor.ueditor.assets');
use Encore\Admin\Form\Field;

class UEditor extends Field
{
    protected $view = 'admin.form.editor';


    public function render()
    {
        $csrfToken = csrf_token();
        $this->script = <<<EOT
        var ue = UE.getEditor('container');
        ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });

EOT;
        return parent::render();
    }
}