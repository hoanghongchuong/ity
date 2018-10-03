@extends('index')
@section('content')
<?php
    $setting = Cache::get('setting');
    $about = Cache::get('about');
?>
<div id="content">
    <div class="page-title-wrap page-title-wrap-bg" style="background-image: url({{asset('public/images/bg-title.jpg')}});">
    <div class="page-title-overlay"></div>
        <div class="container">
            <div class="page-title-inner block-center">
                <div class="block-center-inner">
                    <h1>Danh mục</h1>
                    <ul class="breadcrumbs breadcrumbs-left">
                        <!-- <li class="first">You are here:</li> -->
                        <li class="home">
                            <span>
                                <a rel="v:url" href="{{url('')}}" class="home">
                                    <span>Trang chủ</span>
                                </a>
                            </span>
                        </li>
                        <li>
                            <span>Tin tức</span>
                        </li>
                        <li><span>{{ $tintuc_cate->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="site-content-archive">
        <div class="container clearfix">
            <div class="row clearfix">
                <div class="sidebar left-sidebar col-md-3">
                   <!--  <aside id="search-2" class="widget widget_search">
                        <form class="search-form" method="get" id="searchform" action=""> 
                            <input type="text" value="" name="s" id="s" placeholder="Search..."> 
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </aside> -->
                    <!--  -->

                    <aside class="widget widget_categories">
                        <h4 class="widget-title"><span>Danh sách tin tức</span></h4>
                            <ul>
                                @foreach($cateNews as $cate)
                                <li class="cat-item @if($cate->id == $tintuc_cate->id) current-cat @endif">
                                    <a href="{{url('tin-tuc/'.$cate->alias)}}">{{ $cate->name }}</a>
                                </li>
                                @endforeach

                            </ul>
                    </aside>

                    <aside class="widget widget-posts" >
                        <h4 class="widget-title"><span>Tin tức nổi bật</span></h4>
                        <div class="widget-posts-wrap">
                        <!-- item -->
                        @foreach($hot_news as $hot)
                            <div class="widget_posts_item clearfix">
                                <div class="widget-posts-thumbnail">
                                    <div class="entry-thumbnail">
                                        <a href="#" class="entry-thumbnail_overlay">
                                            <img width="160" height="160" class="img-responsive" src="http://viettitan.com/wp-content/uploads/2017/04/thiet-ke-website-do-choi-Viettitan-1.gif">
                                        </a>
                                        <a href="#" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                                    </div>
                                </div>
                                <div class="widget-posts-content-wrap">
                                    <a class="widget-posts-title" href="#">{{$hot->name}}</a>
                                    <div class="widget-posts-date"> {{date('d/m/Y', strtotime($hot->created_at))}}</div>
                                </div>
                            </div>
                        @endforeach
                
                        </div>
                    </aside>
                </div>
                <div class="site-content-archive-inner col-md-9">
                    <div class="blog-wrap layout-container blog-style-2">
                        <div class="blog-inner clearfix">
                            @foreach($tintuc as $item)
                            <article  class="clearfix style-2 post type-post ">
                                <div class="entry-wrap clearfix">
                                    <div class="entry-thumbnail-wrap">
                                        <div class="entry-thumbnail">
                                            <a href="{{url('tin-tuc/'.$item->alias.'.html')}}" class="entry-thumbnail_overlay">
                                                <img width="300" height="300" class="img-responsive" src="{{ asset('upload/news/'.$item->photo) }}">
                                            </a>
                                            <a href="#" class="prettyPhoto"><i class="fa fa-expand"></i></a>
                                        </div>
                                    </div>
                                    <div class="entry-content-wrap">
                                        <div class="entry-content-top-wrap clearfix">
                                            <div class="entry-content-top-right">
                                                <h3 class="entry-title"> <a href="{{url('tin-tuc/'.$item->alias.'.html')}}"><span >{{$item->name}}</span></a></h3>
                                                <div class="entry-post-meta-wrap">
                                                    <ul class="entry-meta">
                                                        <li class="entry-meta-date"> 
                                                            <a href="#"> <span>{{ date('d/m/Y', strtotime($item->created_at)) }}</span> </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entry-excerpt">
                                            <p>{!! $item->mota !!}
                                                <a class="read-more" href="{{url('tin-tuc/'.$item->alias.'.html')}}"> Xem tiếp</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection