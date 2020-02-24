@if ($prds)
<section id="recently-viewed-items-list">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title">Bạn đã xem</h2>
          <div id="recently-viewed-slider" class="product-list owl-carousel owl-theme">
          	@foreach ($prds as $prd)
            <div class="item">
              <a href="{{route('front.product-detail',$prd->slug)}}">
                <div class="product-item">
                  <div class="product-image">
                    <figure>
                      <img src="{{$prd->thumb}}">
                    </figure>
                  </div>
                  <div class="product-text">
                  <h3 class="product-name">{{$prd->name}}</h3>
                  <h4 class="product-price price">{{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}<sup>đ</sup></h4>
                  @if ($prd->sale_price)
                <div class="product-discount">
                  <h5 class="percentage-discount price">{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}} %</h5>
                  <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
                </div>
        @endif
                </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
 </section>
 @endif