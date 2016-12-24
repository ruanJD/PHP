<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\Navs;

class IndexController extends CommonController
{
    public function index()
    {

        //点击量最高右侧
        $pics=Article::orderBy('art_view','desc')->take(6)->get();


        //图文列表
        $data=Article::orderBy('art_time','desc')->paginate(5);

        //友情链接
        $links=Links::orderBy('link_order','asc')->get();

        return view('home/index',compact('pics','data','links'));
    }

    public function cate($cate_id)
    {

        //查看次数自增
        Category::where('cate_id',$cate_id)->increment('cate_view');

        $data=Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(4);

        $submenu=Category::where('cate_pid',$cate_id)->get();
        $field=Category::find($cate_id);
        dd($field);
        return view('home/list',compact('field','data','submenu'));
    }

    public function article($art_id)
    {

        //查看次数自增
        Article::where('art_id',$art_id)->increment('art_view');

        $field=Article::Join('category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();
        $article=Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $next=Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();
        $data=Article::where('cate_id',$field->cate_id)->orderBy('art_id','desc')->take(6)->get();
        return view('home/new',compact('field','article','next','data'));
    }
}
