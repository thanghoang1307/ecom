<!-- Modal -->
<div class="modal fade login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-form-nav">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <ul class="nav" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                 aria-selected="true">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register"
                 aria-selected="false">Đăng ký</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form action="{{route('front.customer.login')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" id="inputUser"
                           aria-describedby="inputUser">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" id="inputPassword"
                           aria-describedby="inputPassword">
                    <a href="#" class="forgot-password">Quên mật khẩu?</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <button class="btn-submit" type="submit">Đăng nhập</button>
                  <p class="form-sub-text">Hoặc bằng</p>
                  <div class="row">
                    <div class="col-6">

                      <a href="{{ route('front.oauth.redirect','facebook') }}" class="btn-facebook">Facebook</a>
                    </div>
                    <div class="col-6">
                      <a href="{{ route('front.oauth.redirect','google') }}" class="btn-google">Google</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form action="{{route('front.customer.create')}}" class="register-form" method="POST">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-4 col-md-3">
                      <div class="form-group">
                        <div class="radio">
                          <input id="radio-1" name="gender" type="radio" checked>
                          <label for="radio-1" class="radio-label">Anh</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 col-md-3">
                      <div class="form-group">
                        <div class="radio">
                          <input id="radio-2" name="gender" type="radio">
                          <label for="radio-2" class="radio-label">Chị</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Điện thoại">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Địa chỉ email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="password" name="password_confirm" class="form-control" placeholder="Xác nhận mật khẩu">
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn-submit" type="submit">Tạo tài khoản</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade login-form" id="socialLoginModal" tabindex="-1" role="dialog" aria-labelledby="socialLoginModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-form-nav">
          <h3 class="popup-title">Xác nhận thông tin tài khoản</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="tab-content">
          <form action="#" class="register-form">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="form-group">
                      <div class="radio">
                        <input id="radio-1" name="radio" type="radio" checked>
                        <label for="radio-1" class="radio-label">Anh</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-4 col-md-3">
                    <div class="form-group">
                      <div class="radio">
                        <input id="radio-2" name="radio" type="radio">
                        <label for="radio-2" class="radio-label">Chị</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Họ và tên">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Điện thoại">
                </div>
              </div>
              <div class="col-12">
                <button class="btn-submit" type="submit">Tạo tài khoản</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>