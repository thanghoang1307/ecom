  <section class="home-new-product">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title">{{$title}}</h2>
          <a href="product-list.html" class="view-all">Xem tất cả</a>
        </div>
      </div>
  	<div id="home-new-product-wrapper" class="product-list owl-carousel owl-theme">
@component('components.product-loop',['prds' => $prds])
@endcomponent
  	</div>
  	<div class="d-block d-sm-none view-all-btn">
  	    <a href="product-list.html" class="">Xem tất cả</a>
  	</div>
    </div>
  </section>