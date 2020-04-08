@extends('layouts.front')
@section('content')
<main id="one-stop-profile" class="main profile-page">
    <div class="container">
      <section id="profile-title">
        <div class="page-breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
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
                <p>Cảm ơn bạn đã gia nhập gia đình OnStopShop.vn.</p>
                <p>Bạn sẽ được hưởng quyền lợi giá cả, quà tặng, các dịch vụ đi kèm và nhiều hơn nữa.</p>
                <p>Bắt đầu trải nghiệm nào!</p>
              </div>
            </div>
            <div class="dashboard-body">
              <section id="profile-change-info">
                <div class="change-info-header">
                  <h4 class="section-title">Hoàn tất đăng ký tài khoản</h4>
                </div>
                <div class="change-info-body">
                <form name="changeInfoForm" class="change-info-form" data-parsley-validate action="{{route('front.customer.create_by_social')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group select-group">
                          <select class="form-control" id=""
                                  data-parsley-required='gender-register-1'
                                        data-parsley-required-message="Hãy chọn giới tính!"
                                      aria-describedby="gender-register-1" name="gender">
                          
                            <option selected disabled="">Nam/Nữ</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                          </select>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="form-group">
                          <input type="number" class="form-control" placeholder="Số điện thoại"
                                  id="inputPhone"
                                  data-parsley-type="integer"
                                  minlength="10"
                                  data-parsley-minlength="10"
                                  data-parsley-minlength-message="Số điện thoại phải là 10 chữ số"
                                  data-parsley-required-message="Hãy nhập Số điện thoại"
                                  data-parsley-required='true'
                                  aria-describedby="inputPhone" name="phone">
                        </div>
                      </div>
                    </div>
                <input type="hidden" name="name" value="{{$name}}">
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="provider" value="{{$provider}}">
                <input type="hidden" name="id" value="{{$id}}">
                    <div class="form-submit">
                      <button type="submit" class="btn-submit">Hoàn tất</button>
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