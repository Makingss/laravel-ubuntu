<?php
/**
 * Created by PhpStorm.
 * User: Making
 * Date: 2017/2/22
 * Time: 17:18
 */

namespace App\Admin\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class ToolsbaseController extends Controller
{
//    protected $path=[];
    public function fileUpload(Request $request)
    {
        if ($request->hasFile('files[]')) {
            $file = $request->file('files[]');
            $folderName = date('Ymd');
            if (!Storage::disk('local')->exists($folderName)) {
                Storage::makeDirectory($folderName);
            }
            $path= $file->store($folderName . '/images', 'uploadimage');
            dd($path);
            return json_encode(['path'=>$path],true);
//                response()->json(); //response()->json(['status' => 'true', 'msg' => '上传成功', 'path' => $path]);

        } else {
            return response()->json(['status' => 'true', 'msg' => '没有图片']);
        }


    }

}