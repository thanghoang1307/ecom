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
                  <h4 class="section-title">Lấy lại mật khẩu</h4>
                </div>
                <div class="change-password-body">
                <form name="changePasswordForm" class="change-password-form" data-parsley-validate action="{{route('front.customer.forget_password')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Email tài khoản của bạn"
                              id="inputEmail"
                              data-parsley-type="email"
                              data-parsley-type-message="Email chưa đúng định dạng"
                              data-parsley-required-message="Hãy nhập Email"
                              data-parsley-required='true'
                              aria-describedby="inputEmail" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="form-submit">
                      <button type="submit" class="btn-submit">Xác nhận</button>
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