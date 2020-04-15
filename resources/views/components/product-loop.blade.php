@foreach ($prds as $prd)
        <div class="item">
          <a href="{{route('front.product-detail',$prd->slug)}}">
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
                  @if ($prd->sale_price)
                <div class="product-discount">
                  <h5 class="percentage-discount">{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}}%</h5>
                  <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
                </div>
        @endif
                </div>
              </a>
              <div class="product-hover  {{$prd->sale_price ? '' : 'no-discount'}}">
                @if ($prd->sale_price)
                <div class="product-promotion">
                  <i class="sale-label"></i> <span>{!!strip_tags($prd->short_desc)!!}</span>
                </div>
                @endif
              </div>
            </div>
          </a>
        </div>
@endforeach
