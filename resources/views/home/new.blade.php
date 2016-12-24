@extends('layout.home')
@section('info')
    <title>{{$field->art_title}} - {{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{$field->art_tag}}" />
    <meta name="description" content="{{$field->art_description}}" />
@endsection
@section('content')
    <article class="blogs">
        <h1 class="t_nav"><span>您当前的位置：<a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>&nbsp;&gt;&nbsp;<a href="{{url('art/'.$field->art_id)}}">{{$field->art_title}}</a></span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a></h1>
        <div class="index_about">
            <h2 class="c_titile">{{$field->art_title}}</h2>
            <p class="box_c"><span class="d_time">发布时间：{{date('Y-m-d H:m'),$field->art_time}}</span><span>编辑：{{$field->art_editor}}</span><span>查看次数：{{$field->art_view}}</span></p>
            <ul class="infos">
                {!! $field->art_content !!}
            </ul>
            <div class="keybq">
                <p><span>关键字词</span>：{{$field->art_tag}}</p>

            </div>
            <div class="ad"> </div>
            <div class="nextinfo">

                <p>上一篇：
                    @if($article)
                    <a href="{{url('art/'.$article->art_id)}}">{{$article->art_title}}</a></p>
                @else
                    <span>没有上一篇了</span>
                @endif
                <p>下一篇：
                    @if($next)
                        <a href="{{url('art/'.$next->art_id)}}">{{$next->art_title}}</a></p>
                    @else
                        <span>没有下一篇了</span>
                @endif
            </div>
            <div class="otherlink">
                <h2>相关文章</h2>
                <ul>
                    @foreach($data as $d)
                        <li><a href="{{url('art/'.$d->art_id)}}" title="{{$d->art_title}}！">{{$d->art_title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <aside class="right">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
            <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
            </script>
            <!-- Baidu Button END -->
            <div class="blank"></div>
            <div class="news">
                <h3>
                    <p>栏目<span>最新</span></p>
                </h3>
                @parent
            </div>
            <div class="visitors">
                {{--<h3>--}}
                    {{--<p>最近访客</p>--}}
                {{--</h3>--}}
                <ul>
                </ul>
            </div>
        </aside>
    </article>
@endsection