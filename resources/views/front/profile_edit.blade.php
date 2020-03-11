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
                <form action="{{route('front.account.update')}}" class="change-info-form" method="POST">
                	@csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group select-group">
                        <select class="form-control" name="gender">
                          <option value="male" {{auth('customer')->user()->gender == 'male'? 'selected' : ''}}>Nam</option>
                          <option value="female" {{auth('customer')->user()->gender == 'female'? 'selected' : ''}}>Nữ</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Tên" value="{{auth('customer')->user()->name}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{auth('customer')->user()->phone}}">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group email-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{auth('customer')->user()->email}}" disabled>
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