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
		@foreach ($middle_banners_1 as $middle_banner)
			@if ($middle_banner)
			<div class="item"><a href="{{$middle_banner->link}}">
			<img src="{{$middle_banner->image}}" class="img-fluid d-none" alt=""></a></div>
			@endif
		@endforeach	
		</div>
	</section>
		
	@foreach( $bot_cats as $key => $value)
		@component('components.cat',['slug' => $value])
		@endcomponent
	@endforeach
		
	<section class="home-mid-banner container">
		<div class="home-mid-banner-wrapper owl-carousel owl-theme">
		@foreach ($middle_banners_2 as $middle_banner)
			@if ($middle_banner)
			<div class="item"><a href="{{$middle_banner->link}}">
			<img src="{{$middle_banner->image}}" class="img-fluid d-none" alt=""></a></div>
			@endif
		@endforeach	
		</div>
	</section>
	
	@component('components.recently_view')
	@endcomponent
	
	<div class="page-gap"></div>
	  @post
	<div class="page-gap"></div>
</div>

@endsection