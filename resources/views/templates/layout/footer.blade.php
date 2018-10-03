<?php
    $setting = Cache::get('setting');
    $about = Cache::get('about');
    $services = DB::table('news')->where('com','dich-vu')->where('status',1)->get();
    $brands = DB::table('partner')->orderBy('id')->get();
?>

<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="index.html" type="" class="logo-footer">
                    <img src="{{asset('upload/hinhanh/'.$setting->photo)}}" alt="" title="">
                </a>
                <p class="copyright mgt-20">{{ $setting->fax }}</p>
            </div>
            <div class="col-md-4">
                <h5>LIÊN  HỆ</h5>
                <div class="row">
                    <div class="">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="{{$setting->phone}}" title="">{{$setting->phone}}</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <a href="{{$setting->email}}" title="">{{$setting->email}}</a>
                            </li>
                            
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <span>Địa chỉ: {{$setting->address}}</span>
                            </li>

                        </ul>
                    </div>
                    
                </div>

            </div>
            <div class="col-md-4">
                <h5>Facebook</h5>
                
                <div class="fb-page" data-href="https://www.facebook.com/ITY-T%E1%BB%95ng-%C4%90%C3%A0i-Telesales-Ti%E1%BA%BFt-Ki%E1%BB%87m-Chi-Ph%C3%AD-240604453169080/" data-tabs="timeline" data-width="330px" data-height="180px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ITY-T%E1%BB%95ng-%C4%90%C3%A0i-Telesales-Ti%E1%BA%BFt-Ki%E1%BB%87m-Chi-Ph%C3%AD-240604453169080/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ITY-T%E1%BB%95ng-%C4%90%C3%A0i-Telesales-Ti%E1%BA%BFt-Ki%E1%BB%87m-Chi-Ph%C3%AD-240604453169080/">ITY - Tổng Đài Telesales Tiết Kiệm Chi Phí</a></blockquote></div>
            </div>
        </div>
    </div>
</section>
<section class="copy-brand">
    <div class="container">
        <p> 2018 All rights reserved</p>
    </div>
</section>


<nav id="cd-lateral-nav" class=" visible-mobile">
   <!--  <div class="search">
        <form class="flex-center-center">
            <input type="text" placeholder="Tìm kiếm">
            <button type="submit"><i class="fa fa-search"></i> </button>
        </form>
    </div> -->
    <ul class="cd-navigation nav-dropdown">
        <li class="active"><a href="{{ url('') }}" title="">Trang chủ</a> </li>
        <li><a href="{{url('gioi-thieu')}}" title="">Giới thiệu</a> </li>
        <li class="item-has-children">
            <a href="#" title="">Dịch Vụ</a>
            <span class="arrow"><img src="{{ asset('public/images/icon/cd-arrow.svg')}}"></span>
            <ul class="sub-menu">
                @foreach($services as $service)
                <li><a href="{{url('dich-vu/'.$service->alias.'.html')}}" title="">{{$service->name}}</a> </li>
                @endforeach
            </ul>
        </li>
        <li class="item-has-children">
            <a href="{{url('tin-tuc')}}" title="">Tin tức</a>
            
        </li>
        <li><a href="{{url('lien-he')}}" title="">Liên hệ</a> </li>
    </ul>
</nav>    

<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=124844007858325";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>