@extends('index')
@section('content')
<?php
    $setting = Cache::get('setting');
    $about = Cache::get('about');
?>
<main class="cd-main-content">
    <section class="paginations">
        <div class="container">
            <ul class="breadcurmbx">
                <li><a href="{{url('')}}" title="">Trang chủ</a> </li>
                <li><span>Liên hệ</span></li>
            </ul>
        </div>
    </section>
    <section class="contact-page pd-60" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="index-title font-ice"><span>GỬI TIN NHẮN</span></h1>
                    <div class="contact-form">
                        <form class="form-horizontal" action="{{route('postContact')}}" method="post">
                        <input name='_token' type='hidden' value="{{csrf_token()}}">
                            <input type="text" name="name" required="" placeholder="Họ tên">
                            <input type="text" name="phone" required="" placeholder="Số điện thoại">
                            <input type="email" name="email" required="" placeholder="Email">
                            
                            <textarea placeholder="Nội dung" required="" name="content"></textarea>
                            <button type="submit">GỬI</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <h2 class="index-title font-ice"><span>Hỗ trợ trực tiếp</span></h2>
                    <div class="contact-info contact-info-1">
                        <p><span>Địa chỉ:</span></p>
                        <p>{{$setting->address}}</p>
                        
                        
                    </div>
                    <div class="contact-info contact-info-2">
                        <p><span>Số điện thoại :</span></p>
                        <p>{{$setting->phone}}</p>
                    </div>
                    <div class="contact-info contact-info-3">
                        <p><span>Email:</span></p>
                        <p>{{$setting->email}}</p>
                    </div>
                    <div id="" class="map">
                      {!! $setting->iframemap !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
