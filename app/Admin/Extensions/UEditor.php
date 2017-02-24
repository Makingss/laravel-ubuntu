<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/19
 * Time: 11:05
 */

namespace App\Admin\Extensions;

//@include('vendor.ueditor.assets');
use Encore\Admin\Form\Field;

class UEditor extends Field
{
    protected $view = 'admin.form.editor';


    public function render()
    {
        $this->script = <<<EOT
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
    });

EOT;
        return parent::render();
    }
}