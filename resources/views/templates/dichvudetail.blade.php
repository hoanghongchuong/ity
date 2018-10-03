@extends('index')
@section('content')

<main class="cd-main-content">
    <section class="paginations">
        <div class="container">
            <ul class="breadcurmbx">
                <li><a href="{{url('')}}" title="">Trang chủ</a> </li>
                <li><span>{{$news_detail->name}}</span></li>
            </ul>
        </div>
    </section>
    <section class="banner-trend">
        <!-- <img src="{{ asset('public/images/picture/banner-news.png')}}" alt="" title=""> -->
    </section>
    <section class="news pd-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="news-detail">
                        <div class="news-item">
                            <h1>{{$news_detail->name}}</h1>
                            <p class="date">{{date('d/m/Y', strtotime($news_detail->created_at))}}</p>
                            {!! $news_detail->content !!}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</main>
@endsection
