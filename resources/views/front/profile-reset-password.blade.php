@extends('layouts.front')
@section('content')
<main id="one-stop-profile" class="main profile-page">
    <div class="container">
      <section id="profile-title">
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
            </ol>
          </nav>
        </div>
      </section>
  
      <div class="row">
        <div class="col-12">
          <section id="profile-dashboard">
            <div class="dashboard-header">
              <div class="dashboard-greeting">
                <p>Cảm ơn bạn đã gia nhập gia đình OneStopShop.vn.</p>
                <p>Bạn sẽ được hưởng quyền lợi giá cả, quà tặng, các dịch vụ đi kèm và nhiều hơn nữa.</p>
                <p>Bắt đầu trải nghiệm nào!</p>
              </div>
            </div>
            <div class="dashboard-body col-sm-6">
              <section id="profile-change-password">
                <div class="change-password-header">
                  <h4 class="section-title">Thiết lập mật khẩu mới</h4>
                </div>
                <div class="change-password-body">
                <form name="changePasswordForm" class="change-password-form" action="{{route('front.customer.reset_password')}}" method="POST" data-parsley-validate>
                  @csrf                    
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="Mật khẩu mới"
                                  id="myNewPassword"
                                  minlength="6"
									data-parsley-minlength="6"
									data-parsley-minlength-message="Mật khẩu phải chứa ít nhất 6 ký tự"
                                  data-parsley-required-message="Hãy nhập Mật khẩu"
                                  data-parsley-required='true'
                                  aria-describedby="myNewPassword" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="Xác nhận mật khẩu mới"
                                  id="inputConfirmedNewPassword"
                                  data-parsley-equalto="#myNewPassword"
                                  data-parsley-equalto-message="Mật khẩu xác nhận chưa chính xác"
                                  data-parsley-required-message="Hãy nhập xác nhận Mật khẩu"
                                  data-parsley-required='true'
                                  aria-describedby="inputConfirmedNewPassword" name="password_confirm">
                        </div>
                      </div>
                    </div>
                  <input type="hidden" name="email" value="{{$email}}">
                  <input type="hidden" name="token" value="{{$token}}">
                    <div class="form-submit">
                      <button type="submit" class="btn-submit">Thiết lập</button>
                      <button type="button" class="btn-cancel">Hủy</button>
                    </div>
                  </form>
                </div>
              </section>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>
@endsection