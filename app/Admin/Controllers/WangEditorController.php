<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/17
 * Time: 18:04
 */
namespace App\Admin\Controllers;
use App\Http\Controllers\Controller;

class WangEditorController extends Controller{

    public function index(){
        return view('admin.form.wangeditor');
    }
}