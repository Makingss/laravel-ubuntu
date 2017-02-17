<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/17
 * Time: 14:00
 */
namespace App\Admin\Controllers;
/**
 *
 */
class WangEditorController extends Controller
{

  public function index(){
    return view('admin/form/wangeditor');
  }
}
