<?php
    $setting = Cache::get('setting');
    $services = DB::table('news')->where('com','dich-vu')->where('status',1)->get();

?>
<header class="header-page">
    <section class="header-section visible-desktop">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-33">
                    <a href="{{url('')}}" title="" class="logo"><img src="{{asset('upload/hinhanh/'.$setting->photo)}}" alt="" title=""> </a>
                </div>
                <div class="col-md-6 col-99">
                    <div class="header-nav">
                        <ul class="flex-center-between">
                            <li class="@if(@$com == 'index')active @endif"><a href="{{url('')}}" title="">Trang chủ</a> </li>
                            <li class="@if(@$com == 'gioi-thieu')active @endif"><a href="{{url('gioi-thieu')}}" title="">Giới thiệu</a> </li>
                            <li class="@if(@$com == 'dich-vu')active @endif">
                                <a href="#" title="">Dịch Vụ</a>
                                <ul class="submenu">
                                    @foreach($services as $service)
                                    <li><a href="{{url('dich-vu/'.$service->alias.'.html')}}" title="">{{$service->name}}</a> </li>
                                    @endforeach
                                </ul>
                            </li>                           
                            <li class="@if(@$com == 'tin-tuc')active @endif">
                                <a href="{{url('tin-tuc')}}" title="">Tin tức</a>
                            </li>
                            <li class="@if(@$com == 'lien-he')active @endif"><a href="{{url('lien-he')}}" title="">Liên hệ</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="header-mobile visible-mobile">
        <div class="container">
            <div class="logo flex-center-between">
                <a href="{{url('')}}" title=""><img src="{{ asset('upload/hinhanh/'.$setting->photo) }}" alt="" title=""> </a>
                <div class="mobile-action">
                    <!-- <a href="" data-toggle="modal" data-target="#register-form" title="Đăng ký tư vấn" class="register-icon"><i class="fa fa-pencil-square-o"></i></a> -->
                    <a id="cd-menu-trigger" href="#0" class=""><span class="cd-menu-icon"></span></a>
                </div>
            </div>
        </div>
    </section>
</header>
