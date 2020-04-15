@if($prds->count())
          <div class="product-list-wrapper">
            <div class="row">
              @foreach($prds as $prd)
              @if($prd->is_show)
              <div class="col-6 col-md-4 col-lg-3">
                <div class="product-item">
                  <a href="{{route('front.product-detail',$prd->slug)}}">
                    <div class="product-image">
                      <figure>
                        <img src="{{$prd->thumb}}" loading="lazy">
                      </figure>
                    </div>
                    <div class="product-text">
                      <h3 class="product-name">{{$prd->name}}</h3>
                      <h4 class="product-price price">
                        @if($prd->regular_price || $prd->current_price)
                    {{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}<sup>đ</sup>
                    @else
                    Liên hệ
                    @endif</h4>
                      @if($prd->sale_price)
                      <div class="product-discount">
                        <h5 class="percentage-discount">{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}}%</h5>
                        <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
                      </div>
                       @endif
                    </div>
                  </a>
                  @if($prd->short_desc)
                  <div class="product-hover {{$prd->short_desc ? '' : 'no-discount'}}">
                <div class="product-promotion">
                  <i class="sale-label"></i> <span>{!!strip_tags($prd->short_desc)!!}</span>
                </div>
              </div>
                  @endif
                </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
          {{$prds->appends(request()->input())->links('components.paginate')}}
          @else
          <div class="error404" style="text-align: center; width: 100%; display: block;">
				<p style="text-align: center; font-weight: bold;">Không tìm thấy sản phẩm phù hợp với từ khoá này</p>
				<br />
				<img style="max-width: 60%; margin-bottom: 30px;" class="img-fluid" src="https://onestopshop.vn/assets/img/404_not-found.png"></div>
          @endif
