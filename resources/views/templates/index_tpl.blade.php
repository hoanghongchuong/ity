@extends('index')
@section('content')

<?php
$setting = Cache::get('setting');
$slider = DB::table('slider')->select()->where('status',1)->where('com','gioi-thieu')->orderBy('created_at','desc')->get();
?>
<main class="cd-main-content cd-main-content-index">
    @include('templates.layout.slider')
    <section class="home-about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-content">
                        <h1 class="index-title"><span>Giới thiệu</span></h1>
                        <div class="desc" style="margin-top: 30px; width: 100%; float: left;">
                            {!! @$about->mota !!}
                        </div>
                        <p><a href="{{url('gioi-thieu')}}" title="" class="btn-box btn-invert btn-sm-box inflex-center-center">Xem thêm</a> </p>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <a href="" title="" class="zoom"><img src="images/picture/about-home.png" alt="" title=""> </a>
                </div> -->
            </div>
        </div>
    </section>
    <section class="index-service">
        <div class="container">
            <h2 class="index-title text-center text-uppercase"><span>Thế mạnh của chúng tôi</span></h2>
            <div class="block-list chuong-fix">
                <div class="row" style="text-align: center; font-size: 20px; ">
                    <div class="col-md-3 chuong-fix-box">
                        
                        <h4><span class="counter">100</span>%</h4>
                        <p>Trung Thực</p>
                    </div>
                    <div class="col-md-3 chuong-fix-box">
                        
                        <h4><span class="counter">99</span>%</h4>
                        <p>Bảo Mật</p>
                    </div>
                    <div class="col-md-3 chuong-fix-box">
                        
                        <h4><span class="counter">90</span>%</h4>
                        <p>Chuyên Môn</p>
                    </div>
                    <div class="col-md-3 chuong-fix-box">
                       
                        <h4><span class="counter">85</span>%</h4>
                        <p>Ý Tưởng</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
   
    <section class="banner-register">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Bạn muốn được tư vấn giải pháp cho doanh nghiệp của mình?</h3>
                </div>
                <div class="col-md-6 flex-center-center z-index-2">
                    <a  class="btn-box btn-invert overlay inflex-center-center" href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                </div>
            </div>
        </div>
    </section>
    <section class="index-service">
        <div class="container">
            <h2 class="index-title text-center text-uppercase"><span>Quy trình hợp tác</span></h2>
            <div class="block-list flex-center-between">
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-file">                                
                        </span>
                    </div>
                    <p class="desc">Đặt mục tiêu</p>
                </div>
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-lightbulb-o">
                            
                        </span>
                    </div>
                    <p class="desc">Lên ý tưởng</p>
                </div>
                
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-picture-o">
                            
                        </span>
                    </div>
                    <p class="desc">Chuẩn bị</p>
                </div>
                
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-gear">
                            
                        </span>
                    </div>
                    <p class="desc">Triển khai</p>
                </div>
                
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-eye">
                            
                        </span>
                    </div>
                    <p class="desc">Giám sát</p>
                </div>
                
                <div class="list-item text-center">
                    <div class="circle-image mgb-20 iconx">
                        <span class="fa fa-check-square">
                            
                        </span>
                    </div>
                    <p class="desc">Nghiệm thu</p>
                </div>
                

            </div>
        </div>
    </section>
    <section class="index-contact" id="contact">
        <div class="row no-gutters no-margin">
            <div class="col-md-6">
                <div id="" class="map">
                	{!! $setting->iframemap !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact">
                    <h4>ITY</h4>
                    <ul>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>{{$setting->address}}</span>
                        </li>
                        <!-- <li>
                            <i class="fa fa-globe"></i>
                            <a href="" title="">{{$setting->email}}</a>
                        </li> -->
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="" title="">{{$setting->phone}}</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="" title="">{{$setting->email}}</a>
                        </li>
                    </ul>
                    <form class="form-contact" action="{{route('postContact')}}" method="post">
                        <input name='_token' type='hidden' value="{{csrf_token()}}">
                        <input type="text" name="name" required="" placeholder="Họ và tên">
                        <input type="email" name="email" required="" placeholder="Email">
                        <input type="text" name="phone" required="" placeholder="Số điện thoại">
                        <!-- <input type="text" placeholder="Website"> -->
                        <textarea  placeholder="Nội dung" required="" name="content"></textarea>
                        <p class="text-right"><button type="submit">Gửi</button> </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
