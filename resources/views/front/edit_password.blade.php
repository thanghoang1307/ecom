@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'password'])
@endcomponent
                    <div class="dashboard-body">
            <section id="profile-change-password">
              <div class="change-password-header">
                <h4 class="section-title">Đổi mật khẩu</h4>
              </div>
              <div class="change-password-body">
                <form action="{{route('front.account.update_password')}}" method="POST" class="change-password-form">
                  @csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="password" name="old_password" class="form-control" placeholder="Mật khẩu hiện tại">
                        @error('old_password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu mới">
                        @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-submit">
                    <button type="submit" class="btn-submit">Thay đổi</button>
                    <a href="{{route('front.account.index')}}"><button type="button" class="btn-cancel">Hủy</button></a>
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