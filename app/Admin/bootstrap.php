<?php
use \Encore\Admin\Form;

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
Form::extend('editor', \App\Admin\Extensions\UEditor::class);
Form::extend('fileinput',\App\Admin\Extensions\Fileinput::class);
app('translator')->addNamespace('admin', resource_path('lang/admin'));
app('view')->prependNamespace('admin', resource_path('views/admin'));



