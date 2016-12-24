@extends('layout.home')
<link href="{{asset('resources/views/home/css/style.css')}}" rel="stylesheet">
@section('info')
    <title>{{Config::get('cofweb.web_title')}}-{{Config::get('cofweb.seo_title')}}</title>
    <meta name="keywords" content="{{Config::get('cofweb.keywords')}}" />
    <meta name="description" content="{{Config::get('cofweb.description')}}" />
@endsection


@section('content')
<div class="banner">
    <section class="box">
        <ul class="texts">
            <p>不乱于心，不困于情。不畏将来，不念过往。如此，安好!</p>
            <p>深谋若谷，深交若水。深明大义，深悉小节。已然，静舒!</p>
            <p>善宽以怀，善感以恩。善博以浪，善精以业。这般，最佳!</p>
            <p>勿感于时，勿伤于怀。勿耽美色，勿沉虚妄。从今，进取!</p>
            <p>无愧于天，无愧于地。无怍于人，无惧于鬼。这样，人生!</p>
        </ul>
        <div class="avatar"><a href="#"><span>ruan</span></a> </div>
    </section>
</div>
<div class="template">
    <div class="box">
        <h3>
            <p><span>点击最多</span></p>
        </h3>
        <ul>
            @foreach($pics as $p)
            <li><a href="{{url('art/'.$p->art_id)}}"  ><img src="{{url($p->art_thumb)}}"></a><span>{{$p->art_title}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
<article>
    <h2 class="title_tj">
        <p>文章<span>推荐</span></p>
    </h2>
    <div class="bloglist left">
        @foreach($data as $d)
        <h3>{{$d->art_title}}</h3>
        <figure><img src="{{url($d->art_thumb)}}" style='width:180px; height:120px'></figure>
        <ul>
            <p>{{$d->art_description}}</p>
            <a title="{{$d->art_title}}" href="{{url('art/'.$d->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
        </ul>
        <p class="dateview"> <span style="margin-right:40px">{{date('Y-m-d H:m'),$d->art_time}}</span><span>作者：{{$d->art_editor}}</span></p>
        @endforeach
            <div class="page">
                {{$data->links()}}
            </div>
    </div>
    <aside class="right">
        <div class="weather">
            <iframe allowtransparency="true"  frameborder="0" width="195" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=2&z=3&t=0&v=0&d=1&bd=0&k=&f=0000ff&q=1&e=1&a=1&c=54511&w=195&h=96&align=center"></iframe>
            {{--<iframe width="250" scrolling="no" height="60" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=12&icon=1&num=1"></iframe>--}}
        </div>
        <div class="news">
            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            @parent
            <h3 class="links">
                <p>友情<span>链接</span></p>
            </h3>
            <ul class="website">
                @foreach($links as $l)
                    <li><a href="{{url('art/'.$l->art_id)}}">{{$l->link_name}}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
        <script type="text/javascript" id="bdshell_js"></script>
        <script type="text/javascript">
            document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
        </script>
        <!-- Baidu Button END -->
    </aside>
</article>
@endsection