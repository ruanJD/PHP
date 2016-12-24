<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CommonController extends Controller
{
    //图片上传
    public function upload()
    {
		$bad='上传失败';
		$error='上传失败,必须上传图片格式';
		$fileTypes = array('jpg', 'jpeg', 'gif', 'png');
        $file = Input::file('Filedata');
        if ($file -> isValid()){
			   if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $fileTypes)) {
   			return $error;
        }
            $entension=$file -> getClientOriginalExtension();
            $newName=date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path=$file->move(base_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
			return $filepath;								
        }else{
			return $bad;
		}
		    
    }
	
}
