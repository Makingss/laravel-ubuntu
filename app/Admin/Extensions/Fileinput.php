<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/22
 * Time: 9:17
 */

namespace App\Admin\Extensions;


use Encore\Admin\Form\Field;

class Fileinput extends Field
{
//    public function  __construct($column, array $arguments)
//    {
//        dd($column);
//        parent::__construct($column, $arguments);
//    }

    protected $view = 'admin.form.fileinput';
    protected static $css = [
        '/fileinput/css/fileinput.min.css',
        '/fileinput/themes/explorer/theme.css'
    ];
    protected static $js = [
        '/fileinput/js/plugins/canvas-to-blob.min.js',
        '/fileinput/js/plugins/sortable.min.js',
        '/fileinput/js/plugins/purify.min.js',
        '/fileinput/js/fileinput.min.js',
        '/fileinput/js/locales/zh.js',
        '/fileinput/themes/explorer/theme.js',
    ];

    public function render()
    {
        $public_path = $_SERVER['HTTP_HOST'] . '/uploads/';
//            dd($public_path);
        $model_goods = $this->form->model()->getAttributes();
        $goods_image[] = @$model_goods['image_default_id'];
//        dd($goods_image);
        $csrf_token = csrf_token();
        $url = url('/admin/fileupload');
        $this->script = <<<EOT
       
 $.ajaxSetup({
        'headers': {
            'X-CSRF-TOKEN': '$csrf_token'
        }
    });
    $('#file-fr').fileinput({
        showUpload: true,
        showCaption: false,
        language: 'zh',
        uploadUrl: '$url',
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
        dropZoneEnabled: true,//是否显示拖拽区域
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
        '/uploads/{$goods_image[0]}'
        ],
        initialPreviewConfig: [
            {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{}", key: 1},
            {caption: "transport-2.jpg", size: 872378, width: "120px", url: "{}", key: 2},
        ],
    });
    $('#file-fr').on('fileuploaded', function (event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
        console.info(response);
    })
EOT;

        return parent::render(); // TODO: Change the autogenerated stub
    }
}