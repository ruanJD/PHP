<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index()
    {
        $uname=session('user','user_name');
        return view('admin.index',compact('uname'));
    }

    public function info()
    {

        return view('admin.info');
    }

    //修改管理员密码
    public function pass()
    {
        if($input=Input::all()){
            $rules=[
              'password'=>'required|between:6,20|confirmed',
            ];
            $message=[
              'password.required'=>'新密码不能为空',
              'password.between'=>'新密码必须在6-20位之间',
              'password.confirmed'=>'新密码与确认密码必须一致',
            ];
            $validator=Validator::make($input,$rules,$message);

            if($validator->passes()){
                $user=User::first();
                $_password=Crypt::decrypt($user->user_pass);
                if ($input['password_o']==$_password){
                    $user->user_pass=Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('ok','密码修改成功，请重新登陆!');
                    //return redirect('admin/info');
                }else{
                    return back()->with('errors','原密码错误!');
                }
            }else{
                return back()->withErrors($validator);
               // dd($validator->errors()->all());
            }
        }else{
            return view('admin.pass');
        }
    }
}
