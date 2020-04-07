@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'thong-tin'])
@endcomponent
          <div class="dashboard-body">
            <section id="profile-change-info">
              <div class="change-info-header">
                <h4 class="section-title">Thay đổi thông tin cá nhân</h4>
              </div>
              <div class="change-info-body">
                <form action="{{route('front.account.update')}}" class="change-info-form" method="POST" data-parsley-validate>
                	@csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group select-group">
                        <select class="form-control" name="gender"
                        	id="inputGender"
                            data-parsley-required-message="Hãy chọn Giới tính"
                        	data-parsley-required='true'
                        	aria-describedby="inputGender">
						  <option disabled="">Nam/Nữ</option>
                          <option value="male" {{auth('customer')->user()->gender == 'male'? 'selected' : ''}}>Nam</option>
                          <option value="female" {{auth('customer')->user()->gender == 'female'? 'selected' : ''}}>Nữ</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Tên" value="{{auth('customer')->user()->name}}"
                        id="inputUser"
                        data-parsley-required-message="Hãy nhập Họ và tên"
                        data-parsley-required='true'
                        aria-describedby="inputUser">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" value="{{auth('customer')->user()->phone}}"
                        id="inputPhone"
                        data-parsley-type="integer"
                        minlength="10"
						data-parsley-minlength="10"
						data-parsley-minlength-message="Số điện thoại phải là 10 chữ số"
                        data-parsley-required-message="Hãy nhập Số điện thoại"
                        data-parsley-required='true'
                        aria-describedby="inputPhone">
						 @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group email-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{auth('customer')->user()->email}}" disabled="">
                        <i class="icon icon-check-circle"></i>
                      </div>
                    </div>
                  </div>
                  <div class="form-submit">
                    <button type="submit" class="btn-submit">Thay đổi</button>
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