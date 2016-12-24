<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get.admin/category 全部分类列表
    public function index()
    {
        $categorys=(new Category)->tree();
       // $data=$this->getTree($categorys,'cate_name','cate_id','cate_pid');
        return view('admin.category.index')->with('data',$categorys);
    }


//    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0)
//    {
//        $arr=array();
//       foreach ($data as $k=>$v){
//           if($v->$field_pid==$pid){
//               $data[$k]["_".$field_name]=$data[$k][$field_name];
//               $arr[]=$data[$k];
//               foreach ($data as $m=>$n){
//                   if($n->$field_pid==$v->$field_id){
//                       $data[$m]["_".$field_name]='┣━━'.$data[$m][$field_name];
//                       $arr[]=$data[$m];
//                   }
//               }
//           }
//       }
//       return $arr;
//    }

    public function changeOrder()
    {
        $input=Input::all();
        $cate=Category::find($input['cate_id']);
        $cate->cate_order=$input['cate_order'];
        $re=$cate->update();
        if ($re){
            $data=[
              'status'=>0,
                'msg'=>'分类排序更新成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'分类排序更新失败,请重试！',
            ];
        }
        return $data;
    }


    //get.admin/category/create  添加分类
    public function create()
    {
        $data=Category::where('cate_pid',0)->get();
        return view('admin/category/add',compact('data'));
    }


    //post.admin/category   添加分类提交方法
    public function store()
    {
        $input=Input::except('_token');
        $rules=[
            'cate_name'=>'required',
        ];
        $message=[
            'cate_name.required'=>'分类名称不能为空',
        ];

        $validator=Validator::make($input,$rules,$message);

        if($validator->passes()){
           $re=Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','数据添加失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }


    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }




    //get.admin/category/{category}/edit  编辑分类
    public function edit($cate_id)
    {
        $field=Category::find($cate_id);
        $data=Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('field','data'));
    }

    //put.admin/category/{category}   更新分类
    public function update($cate_id)
    {
       $input=Input::except('_token','_method');
        $re=Category::where('cate_id',$cate_id)->update($input);
        if ($re){
            return redirect('admin/category');
        }else{
            return back()->with('errors','数据更新失败，请检查确保信息无误后重试！');
        }
    }



    //delete.admin/category/{category}   删除单个分类
    public function destroy($cate_id)
    {
        $re=Category::where('cate_id',$cate_id)->delete();
        Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
        if($re){
            $data=[
              'status'=>0,
                'msg'=>'分类删除成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'分类删除失败,请稍后重试！'
            ];
        }
        return $data;
    }


}
