<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/18
 * Time: 9:29
 */

namespace App\Admin\Extensions;


use Encore\Admin\Form\Field;

class WangEditor extends Field
{
    protected $view = 'admin.form.editor';

    protected static $js = [
//        '/packages/wangEditor-2.1.22/dist/js/wangEditor.min.js',
        '/packages/wangEditor-2.1.22/dist/js/wangEditor.js'
    ];
    protected static $css = [
        '/packages/wangEditor-2.1.22/dist/css/wangEditor.css',
        '/packages/wangEditor-2.1.22/dist/css/wangEditor.less',
        '/packages/wangEditor-2.1.22/dist/css/wangEditor.min.css'
    ];

    public function render()
    {
        $token = csrf_token();
        $this->script = <<< EOT
        var editor=new wangEditor('{$this->id}');
        
//        editor.config.uploadImgFileName = 'image';
        editor.config.uploadImgUrl = '/upload/image';
        editor.config.uploadHeaders={
        'Accept' : 'text/x-json'
        };
        editor.config.uploadParams = {
        _token: '$token'
        };
        // 自定义load事件
        editor.config.uploadImgFns.onload = function (resultText, xhr) {
        // resultText 服务器端返回的text
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持

        // 上传图片时，已经将图片的名字存在 editor.uploadImgOriginalName
        var originalName = editor.uploadImgOriginalName || '';  

        // 如果 resultText 是图片的url地址，可以这样插入图片：
        editor.command(null, 'insertHtml', '<img src="' + resultText + '" alt="' + originalName + '" style="max-width:100%;"/>');
        // 如果不想要 img 的 max-width 样式，也可以这样插入：
        // editor.command(null, 'InsertImage', resultText);
        };

        // 自定义timeout事件
        editor.config.uploadImgFns.ontimeout = function (xhr) {
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持
        alert('上传超时');
        };

        // 自定义error事件
        editor.config.uploadImgFns.onerror = function (xhr) {
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持
        alert('上传错误');
        };

        editor.create();
EOT;
        return parent::render();
    }
}