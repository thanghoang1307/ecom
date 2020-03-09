          <div class="product-list-wrapper">
            <div class="row">
              @foreach($prds as $prd)
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="{{route('front.product-detail',$prd->slug)}}">
                    <div class="product-image">
                      <figure>
                        <img src="{{$prd->thumb}}">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">{{$prd->name}}</h3>
                      <h4 class="product-price price">{{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}<sup>đ</sup></h4>
                      @if($prd->sale_price)
                      <div class="product-discount">
                        <h5 class="percentage-discount">{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}}%</h5>
                        <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
                      </div>
                       @endif
                    </div>
                  </a>
                  @if($prd->sale_price)
                  <div class="product-hover">

                    <div class="product-promotion">
                      <i class="sale-label"></i> <span>Ưu đãi/quà tặng từ...</span>
                    </div>
                    <a class="product-add-to-cart" href="#">
                      <i class="icon icon-shopping-cart"></i> <span>Thêm vào giỏ hàng</span>
                    </a>
                  </div>
                  @endif
                </div>
              </div>
              @endforeach
            </div>
          </div>
          {{$prds->appends(request()->input())->links('components.paginate')}}
        