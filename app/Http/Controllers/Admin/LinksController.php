<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{
    //get.admin/links 友情链接列表
    public function index()
    {
        $data=Links::orderBy('link_order','asc')->get();
        return view('admin.links.index',compact('data'));
    }

    public function changeOrder()
    {
        $input=Input::all();
        $link=Links::find($input['link_id']);
        $link->link_order=$input['link_order'];
        $re=$link->update();
        if ($re){
            $data=[
                'status'=>0,
                'msg'=>'链接排序更新成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'链接排序更新失败,请重试！',
            ];
        }
        return $data;
    }



    //get.admin/links/create  添加链接
    public function create()
    {
        //$data=links::where('link_id',0)->get();
        return view('admin/links/add');
    }


    //post.admin/category   添加链接提交方法
    public function store()
    {
        $input=Input::except('_token');
        $rules=[
            'link_name'=>'required',
            'link_url'=>'required',
        ];
        $message=[
            'link_name.required'=>'链接名称不能为空',
            'link_url.required'=>'链接URL不能为空',
        ];


        $validator=Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re=links::create($input);
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','链接添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }


    //get.admin/links/{link}/edit  编辑链接
    public function edit($link_id)
    {
        $field=links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }

    //put.admin/links/{link}   更新链接
    public function update($link_id)
    {
        $input=Input::except('_token','_method');
        $re=links::where('link_id',$link_id)->update($input);
        if ($re){
            return redirect('admin/links');
        }else{
            return back()->with('errors','链接更新失败，请检查确保信息无误后重试！');
        }
    }



    //delete.admin/links/{link}   删除单个链接
    public function destroy($link_id)
    {
        $re=links::where('link_id',$link_id)->delete();
        if($re){
            $data=[
                'status'=>0,
                'msg'=>'链接删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'链接删除失败,请稍后重试！'
            ];
        }
        return $data;
    }

    public function show()
    {
        
    }
}
