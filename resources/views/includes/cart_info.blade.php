<div class="col-md-6">
      <section class="cart-process d-none d-md-block">
        <div class="process-list">
          <ul class="process-list-wrapper">
            <li><a href="#" class="active"><span>Thông tin đặt hàng</span></a></li>
            <li><a href="#"><span class="d-none d-sm-block">Thanh toán</span></a></li>
            <li><a href="#"><span class="d-none d-sm-block">Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="{{route('front.check_out_2')}}" method="POST">
          @csrf
          <div class="process-info">
            <h2 class="process-info-title">Thông tin giỏ hàng</h2>
            <div class="process-profile">
              <div class="row no-gutters">
                @auth('customer')
                <div class="col-12">
                  <div class="process-profile-detail">
                    <div class="process-profile-block-head">
                      <div class="row">
                        <div class="col-12">
                          <div class="radio">
                            @if (Auth::guard('customer')->user()->gender == 'male')
                            <input id="radio-1" name="gender" type="radio" value="male" checked>
                            <label for="radio-1" class="radio-label">Anh</label>
                            @elseif(Auth::guard('customer')->user()->gender == 'female')
                            <input id="radio-1" name="gender" type="radio" value="female" checked>
                            <label for="radio-1" class="radio-label">Chị</label>
                            @else
                            <input id="radio-1" name="gender" type="radio" value="male" checked>
                            <label for="radio-1" class="radio-label">Anh</label>
                            <input id="radio-1" name="gender" type="radio" value="female">
                            <label for="radio-1" class="radio-label">Chị</label>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" value="{{Auth::guard('customer')->user()->name}}" placeholder="Tên">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" value="{{Auth::guard('customer')->user()->phone}}" placeholder="Điện thoại">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email">
                      </div>
                    </div>
                  </div>
                </div>
                @endauth
                @guest('customer')
                <div class="col-md-6">
                  <div class="process-one-click">
                    <h3 class="process-one-click-title">Đặt hàng chỉ một bước với</h3>
                    <ul class="process-one-click-list">
                      <li>
                        <a class="nav-link user-action process-one-click-facebook" href="{{ route('front.oauth.redirect','facebook') }}">Facebook</a>
                      </li>
                      <li>
                        <!--<a class="nav-link user-action process-one-click-google" data-toggle="modal" data-target="#loginModal">--><a class="process-one-click-google" href="{{ route('front.oauth.redirect','google') }}">Google</a>
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
                            <input id="radio-1" name="gender" type="radio" checked value="male">
                            <label for="radio-1" class="radio-label">Anh</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="radio">
                            <input id="radio-2" name="gender" type="radio" value="female">
                            <label for="radio-2" class="radio-label" >Chị</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" placeholder="Họ và tên" name="name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" placeholder="Điện thoại" name="phone">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" placeholder="Địa chỉ email" name="email">
                      </div>
                    </div>
                  </div>
                </div>
                @endguest
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
                            <select class="form-control" name="city" id="exampleFormControlSelect1">
                              <option value="">Tỉnh/Thành</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" name="district" id="exampleFormControlSelect1">
                              <option value="">Quận/Huyện</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" id="exampleFormControlSelect1" name="ward">
                              <option value="">Phường/Xã</option>
                              <option>Hà Nội</option>
                              <option>TP. Hồ Chí Minh</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="address" type="text" class="form-control" id="inputAddress" aria-describedby="inputName" placeholder="Số nhà, tên đường">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lời nhắn cho OneStopShop.vn" name="note"></textarea>
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