<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{
    //get.admin/navs 自定义导航列表
    public function index()
    {
        $data=Navs::orderBy('nav_order','asc')->get();
        return view('admin.navs.index',compact('data'));
    }

    public function changeOrder()
    {
        $input=Input::all();
        $nav=Navs::find($input['nav_id']);
        $nav->nav_order=$input['nav_order'];
        $re=$nav->update();
        if ($re){
            $data=[
                'status'=>0,
                'msg'=>'导航排序更新成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'导航排序更新失败,请重试！',
            ];
        }
        return $data;
    }



    //get.admin/navs/create  添加导航
    public function create()
    {
        //$data=navs::where('nav_id',0)->get();
        return view('admin/navs/add');
    }


    //post.admin/category   添加导航提交方法
    public function store()
    {
        $input=Input::except('_token');
        $rules=[
            'nav_name'=>'required',
            'nav_url'=>'required',
        ];
        $message=[
            'nav_name.required'=>'导航名称不能为空',
            'nav_url.required'=>'导航URL不能为空',
        ];


        $validator=Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re=navs::create($input);
            if($re){
                return redirect('admin/navs');
            }else{
                return back()->with('errors','导航添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }


    //get.admin/navs/{nav}/edit  编辑导航
    public function edit($nav_id)
    {
        $field=navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }

    //put.admin/navs/{nav}   更新导航
    public function update($nav_id)
    {
        $input=Input::except('_token','_method');
        $re=navs::where('nav_id',$nav_id)->update($input);
        if ($re){
            return redirect('admin/navs');
        }else{
            return back()->with('errors','导航更新失败，请检查确保信息无误后重试！');
        }
    }



    //delete.admin/navs/{nav}   删除单个导航
    public function destroy($nav_id)
    {
        $re=navs::where('nav_id',$nav_id)->delete();
        if($re){
            $data=[
                'status'=>0,
                'msg'=>'导航删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'导航删除失败,请稍后重试！'
            ];
        }
        return $data;
    }

    public function show()
    {
        
    }
}
