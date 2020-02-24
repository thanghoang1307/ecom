<section class="home-new-product">
    <div class="container">
      <div class="row">
        <div class="col-12">
          @php
          $cat = $cats->where('slug',$slug)->first();
          @endphp
          <h2 class="page-title">{{$cat->name}}</h2>
          <a href="{{route('front.category-list',$cat->slug)}}" class="view-all">Xem tất cả</a>
        </div>
      </div>
      <div class="fix-product-wrapper product-list owl-carousel owl-theme">
@php
$prds = $cat->prds;
@endphp
@include('includes.product-loop')
</div>
    <div class="d-block d-sm-none view-all-btn">
        <a href="{{route('front.category-list',$cat->slug)}}" class="">Xem tất cả</a>
    </div>
    </div>
  </section>