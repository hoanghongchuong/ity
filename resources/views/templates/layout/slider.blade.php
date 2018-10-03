<?php
	$slider = DB::table('slider')->select()->where('status',1)->where('com','gioi-thieu')->orderBy('created_at','desc')->get();

?>
@if(isset($slider))
<section class="banner banner-slider owl-carousel visible-desktop">
	@foreach($slider as $s)
    <div class="item">
        <img src="{{asset('upload/hinhanh/'.$s->photo)}}" alt="" title="">            
    </div>
    @endforeach
</section>
<section class="banner banner-slider owl-carousel visible-mobile">
	@foreach($slider as $s)
    <p><img src="{{asset('upload/hinhanh/'.$s->photo)}}" alt="" title=""> </p>
    @endforeach
</section>
	
 @endif