<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Model\Navs;
use App\Http\Controllers\Controller;



class CommonController extends Controller
{
    public function __construct()
    {

        //点击量最高横向
        $hot=Article::orderBy('art_view','desc')->take(6)->get();

        //最新文章发布
        $new=Article::orderBy('art_time','desc')->take(7)->get();

        $navs=Navs::all();
        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);
    }
}
