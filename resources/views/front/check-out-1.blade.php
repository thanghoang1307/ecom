@extends('layouts.check-out')
@section('content')
<div id="one-stop-check-out" class="main check-out-page">
  <div class="row no-gutters">
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
                    <h6><a href="#">{{$prd->name}}</a></h6>
                    <h6><span>Mã sản phẩm: <a href="#" class="cart-code">{{$prd->sku}}</a></span></h6>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="cart-price">
                    <div class="text-right">
                      <span class="active-price price">{{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}</span>
                    </div>
                    @if ($prd->sale_price)
                    <div class="text-right">
                      <span class="pre-active-price price">{{$prd->regular_price}}đ</span>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row align-items-center align-content-center">
                <div class="col-4 col-md-6">
                  <button class="cart-action btn-remove-item"><i class="icon icon-remove"></i> Xóa</button>
                </div>
                <div class="col-8 col-md-6">
                  <div class="text-right">
                    <div class="btn-group" role="group">
                      <button type="button" class="btn">-</button>
                      <input disabled type="text" class="form-control" value="1" placeholder="1"
                             aria-label="Input group example" aria-describedby="btnGroupAddon">
                      <button type="button" class="btn">+</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="cart-item">
          <div class="row">
            <div class="col-6">
              <h2 class="cart-info-sub-title">Tạm tính</h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="text-right">
                  <span class="active-price price">{{$total}}đ</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cart-item">
          <div class="row">
            <div class="col-6">
              <h2 class="cart-info-sub-title">Phí vận chuyển</h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="text-right">
                  <h2 class="cart-info-sub-title text-right">Miễn phí</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cart-item">
          <div class="row align-items-center align-content-center">
            <div class="col-6">
              <h2 class="cart-info-sub-title"><strong>Tổng cộng</strong></h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="cart-price">
                  <div class="text-right">
                    <span class="last-price price">3,999,000đ</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cart-pdf">
          <div class="cart-item">
            <div class="row no-gutters align-items-center align-content-center">
              <div class="col-4 col-md-12">
                <a href="#" class="btn-submit is-white">
                  <span class="d-none d-md-block">Tải về file báo giá (.pdf)</span>
                  <span class="d-block d-md-none">Tải báo giá</span>
                </a>
              </div>
              <div class="col-8">
                <a href="#" class="btn-submit d-block d-md-none">
                  <span>Tiến hành thanh toán</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>
    <div class="col-md-6">
      <section class="cart-process d-none d-md-block">
        <div class="process-list">
          <ul class="process-list-wrapper">
            <li><a href="check-out.html" class="active"><span>Thông tin đặt hàng</span></a></li>
            <li><a href="check-out-2.html"><span class="d-none d-sm-block">Thanh toán</span></a></li>
            <li><a href="check-out-3.html"><span class="d-none d-sm-block">Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="#">
          <div class="process-info">
            <h2 class="process-info-title">Thông tin giỏ hàng</h2>
            <div class="process-profile">
              <div class="row no-gutters">
                <div class="col-md-6">
                  <div class="process-one-click">
                    <h3 class="process-one-click-title">Đặt hàng chỉ một bước với</h3>
                    <ul class="process-one-click-list">
                      <li>
                        <a href="#" class="process-one-click-facebook">Facebook</a>
                      </li>
                      <li>
                        <a href="#" class="process-one-click-google">Google</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="process-profile-detail">
                    <div class="process-profile-block-head">
                      <div class="row">
                        <div class="col-4">
                          <div class="radio">
                            <input id="radio-1" name="radio" type="radio" checked>
                            <label for="radio-1" class="radio-label">Anh</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="radio">
                            <input id="radio-2" name="radio" type="radio">
                            <label for="radio-2" class="radio-label">Chị</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" placeholder="Họ và tên">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" placeholder="Điện thoại">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" placeholder="Địa chỉ email">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="process-info">
            <h2 class="process-info-title">Hình thức nhận hàng</h2>
            <div class="process-profile">
              <div class="row no-gutters">
                <div class="col-12">
                  <div class="process-profile-detail">
                    <div class="process-profile-block-head">
                      <div class="row">
                        <div class="col-12">
                          <div class="checkbox">
                            <input id="check-1" name="checkbox" type="checkbox" checked>
                            <label for="check-1" class="checkbox-label">Nhận hàng tại địa chỉ</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-sub">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="">Tỉnh/Thành</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="">Quận/Huyện</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="">Phường/Xã</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control" id="inputAddress" aria-describedby="inputName" placeholder="Số nhà, tên đường">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lời nhắn cho OneStopShop.vn"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="process-info">
            <div class="text-right">
              <button class="btn-submit form-checkout">Tiếp theo <i class="icon icon-arrow-right"></i></button>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
@endsection