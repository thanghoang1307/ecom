  <section class="home-new-product">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title">SẢN PHẨM MỚI</h2>
          <a href="{{route('front.product-list')}}" class="view-all">Xem tất cả</a>
        </div>
      </div>
  	<div id="home-new-product-wrapper" class="product-list owl-carousel owl-theme">
@include('includes.product-loop')
  	</div>
  	<div class="d-block d-sm-none view-all-btn">
  	    <a href="{{route('front.product-list')}}" class="">Xem tất cả</a>
  	</div>
    </div>
  </section>