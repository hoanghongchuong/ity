@extends('index')
@section('content')

<div class="product">
    <div class="container">
        <div class="scholl_alias row">
            <a href="{{ url('') }}">Trang chủxx <i class="fa fa-angle-right"></i></a>
            <a href="#">Dịch vụ</a>
        </div>
     
        <div class="row">
            <div class="col-md-9">
                @foreach($tintuc as $item)
                <div class="box-service">
                    <div class="col-md-3 left">
                        <a href="{{url('dich-vu/'.$item->alias.'.html')}}" class=""><img src="{{ asset('upload/news/'.$item->photo) }}" class="img-responsive" alt=""></a>
                    </div>
                    <div class="col-md-9">
                        <p class="service-name"><a href="{{url('dich-vu/'.$item->alias.'.html')}}">{{$item->name}}</a></p>
                        <p class="date-news">{{ date('d/m/Y', strtotime($item->created_at)) }}</p>
                        <div class="des-service">{!! $item->mota !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class=" col-sm-3 col-md-3 col-lg-3 news_bar">
                    <h3>Sản phẩm mới</h3>
                    <div class="news_bar_new">
                    @foreach($products as $product)
                        <div class="media">
                            <a class="pull-left" href="{{url('san-pham/'.$product->alias.'.html')}}">
                                <img class="media-object" src="{{asset('upload/product/'.$product->photo)}}" alt="Image" width="100px">
                            </a>
                            <div class="media-body">
                                <a href="{{url('san-pham/'.$product->alias.'.html')}}">
                                    <h4 class="media-heading fz16">{{$product->name}}</h4>
                                </a>
                                <p><!-- mô tả ngắn... --></p>
                            </div>
                        </div>
                    @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection