<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    @yield('info')
   <link href="{{asset('resources/views/home/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('resources/views/home/css/new.css')}}" rel="stylesheet">
    <script src="{{asset('resources/views/home/js/modernizr.js')}}"></script>
</head>
<body>
<header>
    <div id="logo"><a href="{{asset('/')}}"></a></div>
    <nav class="topnav" id="topnav">
        @foreach($navs as $k=>$v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
    </nav>
</header>
@section('content')
    {{--<h3>--}}
        {{--<p>最新<span>文章</span></p>--}}
    {{--</h3>--}}
    <ul class="rank">
        @foreach($new as $n)
            <li><a href="{{url('art/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
        @endforeach
    </ul>
    <h3 class="ph">
        <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
        @foreach($hot as $h)
            <li><a href="{{url('art/'.$h->art_id)}}" title="{{$h->art_title}}" target="_blank">{{$h->art_title}}</a></li>
        @endforeach
    </ul>
@show
<footer>
    <p>{!!Config::get('cofweb.CopyRight')!!}    <a href="/">{!! Config::get('cofweb.web_count') !!} </a></p>
</footer>
<script src="{{asset('resources/views/home/js/silder.js')}}"></script>
</body>
</html>