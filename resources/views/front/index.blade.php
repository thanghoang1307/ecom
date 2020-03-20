@extends('layouts.front')
@section('content')
@include('includes.banner')
<div id="one-stop-home" class="main home-page">
@include('includes.brand_slide')

@component('components.new')
@endcomponent

@php
$top_cats = ['he-dieu-hanh','phan-mem-van-phong','phan-mem-bao-mat'];
$bot_cats = ['thiet-ke-cad-cam-cae','may-tram-workstation','bo-luu-dien-ups','may-in'];
@endphp
@foreach( $top_cats as $key => $value)
@component('components.cat',['slug' => $value])
@endcomponent
@endforeach

<section class="home-mid-banner container">
  	<div class="home-mid-banner-wrapper owl-carousel owl-theme">
  	  <div class="item">
        <a href="{{$middle_banner_1->link}}"><img src="{{$middle_banner_1->image}}" class="img-fluid" alt=""></a>
      </div>
  	  <div class="item">
        <a href="{{$middle_banner_2->link}}"><img src="{{$middle_banner_2->image}}" class="img-fluid" alt=""></a>
      </div>
  	</div>
</section>

@foreach( $bot_cats as $key => $value)
@component('components.cat',['slug' => $value])
@endcomponent
@endforeach
  <section class="home-mid-banner container">
  	<div class="home-mid-banner-wrapper owl-carousel owl-theme">
  	  <div class="item">
  	  	<a href="{{$middle_banner_3->link}}"><img src="{{$middle_banner_3->image}}" class="img-fluid" alt=""></a>
  	  </div>
      <div class="item">
        <a href="{{$middle_banner_4->link}}"><img src="{{$middle_banner_4->image}}" class="img-fluid" alt=""></a>
      </div>
  	</div>
  </section>
@component('components.recently_view')
@endcomponent
  <div class="page-gap"></div>
  @post
  <div class="page-gap"></div>
</div>
@endsection