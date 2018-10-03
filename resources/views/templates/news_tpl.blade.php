@extends('index')
@section('content')
<main class="cd-main-content">
    <section class="paginations">
        <div class="container">
            <ul class="breadcurmbx">
                <li><a href="{{url('')}}" title="">Trang chủ</a> </li>
                <li><span>Tin tức</span></li>
            </ul>
        </div>
    </section>
    <section class="news pd-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="news-list">
                        @foreach($tintuc as $item)
                        <div class="news-item">
                            <h4><a href="tin-tuc-chi-tiet.html" title="{{$item->name}}">{{$item->name}}</a> </h4>
                            <p class="date">{{date('d/m/Y', strtotime($item->created_at))}}</p>
                            <a href="{{ url('tin-tuc/'.$item->alias.'.html') }}" title="" class="zoom"><img src="{{asset('upload/news/'.$item->photo)}}" alt="{{$item->name}}" title="{{$item->name}}"> </a>
                            <p class="desc">{!! $item->mota !!}</p>
                            <p  class="read-more"><a href="{{ url('tin-tuc/'.$item->alias.'.html') }}" title="">XEM THÊM</a> </p>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagi">
                        {!! $tintuc->links() !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-top news-right">
                        
                        <div class="news-plus">
                            <h1>TIN NỔI BẬT</h1>
                            @foreach($hot_news as $hot)
                            <div class="news-child">
                                <div class="row">
                                    <div class="col-md-4 col-4">
                                        <a href="{{ url('tin-tuc/'.$hot->alias.'.html') }}" title="{{$hot->name}}" class="zoom"><img src="{{asset('upload/news/'.$hot->photo)}}" alt="{{$hot->name}}" title="{{$hot->name}}"> </a>
                                    </div>
                                    <div class="col-md-8 col-8">
                                        <div class="news-child-txt">
                                            <h5><a href="{{ url('tin-tuc/'.$hot->alias.'.html') }}" title="{{$hot->name}}">{{$hot->name}}</a> </h5>
                                            <p>FEBRUARY 24, 2018</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection