<div class="col-md-6">
      <section class="cart-info">
        @foreach ($prds as $prd)
        <div class="cart-item">
          <div class="row">
            <div class="col-5 col-md-3">
              <div class="cart-image">
                <figure>
                  <img src="{{$prd->thumb}}">
                </figure>
              </div>
            </div>
            <div class="col-7 col-md-9">
              <div class="row">
                <div class="col-md-8">
                  <div class="cart-detail">
                    <h6><a href="{{route('front.product-detail',$prd->slug)}}">{{$prd->name}}</a></h6>
                    <h6><span>Mã sản phẩm: <a href="{{route('front.product-detail',$prd->slug)}}" class="cart-code">{{$prd->sku}}</a></span></h6>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="cart-price">
                    <div class="text-right">
                      <span class="active-price price">{{$prd->current_price}}<sup>đ</sup></span>
                    </div>
                    @if($prd->sale_price)
                    <div class="text-right">
                      <span class="pre-active-price price">{{$prd->regular_price}}<sup>đ</sup></span>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row align-items-center align-content-center">
                <div class="col-4 col-md-6">
                  <button class="cart-action btn-remove-item" prd-id="{{$prd->id}}"><i class="icon icon-remove"></i> Xóa</button>
                </div>
                <div class="col-8 col-md-6">
                  <div class="text-right">
                    <div class="btn-group prd-qty" role="group">
                      <button type="button" class="btn minus">-</button>
                      <input type="text" class="form-control" value="{{session('cart.items.'.$prd->id)}}" placeholder="1" prd-id="{{$prd->id}}"
                             aria-label="Input group example" aria-describedby="btnGroupAddon" disabled="">
                      <button type="button" class="btn plus">+</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        
        <!-- Total -->
        <div class="cart-item d-block d-md-none">
          <div class="row align-items-center align-content-center">
            <div class="col-6">
              <h2 class="cart-info-sub-title"><strong>Tổng cộng</strong></h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="cart-price">
                  <div class="text-right">
                    <span class="last-price price">{{$total}}<sup>đ</sup></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="cart-pdf">
        <!-- Total -->
        <div class="cart-item d-none  d-md-block">
          <div class="row align-items-center align-content-center">
            <div class="col-6">
              <h2 class="cart-info-sub-title"><strong>Tổng cộng</strong></h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="cart-price">
                  <div class="text-right">
                    <span class="last-price price">{{$total}}<sup>đ</sup></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Proposal -->
          <div class="cart-item">
            <div class="row no-gutters align-items-center align-content-center">
              <div class="col-4 col-md-12">
                <a href="{{route('front.tai_bao_gia')}}" target="_blank" class="btn-submit is-white">
                  <span class="d-none d-md-block">Tải về file báo giá (.pdf)</span>
                  <span class="d-block d-md-none">Tải báo giá</span>
                </a>
              </div>
              <div class="col-8">
                <form action="@yield('next')" method="POST">
                  @csrf
                <button type="submit" class="btn-submit d-block d-md-none">
                  <span>Tiến hành thanh toán</span>
                </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
     
    </div>