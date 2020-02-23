@extends('layouts.front')
@section('content')
@nav
<div id="one-stop-home" class="main home-page">
  <section class="home-partner-list d-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="home-partner-list-wrapper">
          	@foreach ($brands as $brand)
            <div class="item">
              <a href="{{url('/thuong-hieu/'.$brand->slug)}}">
                <img src="{{$brand->logo}}" class="img-fluid" alt="">
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@render(\App\ViewComponents\NewProductComponent::class)
@render(\App\ViewComponents\HdhProductComponent::class)
@render(\App\ViewComponents\PMVPProductComponent::class)
@render(\App\ViewComponents\PMBMProductComponent::class)
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
@render(\App\ViewComponents\CadProductComponent::class)
@render(\App\ViewComponents\WorkstationProductComponent::class)
@render(\App\ViewComponents\UPSProductComponent::class)
@render(\App\ViewComponents\PrinterProductComponent::class)
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
  @render(\App\ViewComponents\RecentlyViewProductComponent::class)
  <div class="page-gap"></div>
  @post
  <div class="page-gap"></div>
</div>
@endsection