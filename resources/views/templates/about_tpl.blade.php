@extends('index')
@section('content')

<main class="cd-main-content">    
    <section class="paginations">
        <div class="container">
            <ul class="breadcurmbx">
                <li><a href="{{ url('') }}" title="">Trang chủ</a> </li>
                <li><span>Giới thiệu</span></li>
            </ul>
        </div>
    </section>    
    <section class="about-us pd-60">
        <div class="container">
            <h1 class="text-center page-title">{{$about->name}}</h1>
            <div class="row">
                <div class="col-md-12">                    
                    <div class="about-text">
                        {!! $about->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="index-contact contact-f">
        <div class="row no-gutters no-margin">
            <div class="col-md-6 offset-md-6">
                <div class="contact">
                    <h4 class="page-title has-before">GỬI TIN NHẮN</h4>
                     <form class="form-horizontal form-contact" action="{{route('postContact')}}" method="post">
                        <input name='_token' type='hidden' value="{{csrf_token()}}">
                        <input type="text" name="name" required="" placeholder="Họ và tên">
                        <input type="email" name="email" required="" placeholder="Email">
                        <input type="text" name="phone" placeholder="Số điện thoại">                        
                        <textarea  placeholder="Nội dung"></textarea>
                        <p class="text-right"><button type="submit">Gửi</button> </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
