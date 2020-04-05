@if(session()->get('cart.items'))
<div class="col-md-6">
      <section class="cart-process">
        <div class="process-list d-none d-md-block">
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
              <!-- Hiển thị phần thông tin cá nhân nếu là khách hàng -->
                @auth('customer')
                <div class="col-12">
                  <div class="process-profile-detail">
                    <div class="process-profile-block-head">
                      <div class="row">
                        <div class="col-12">
                          <div class="radio">
                          <!-- Nếu khách hàng là nam -->
                            @if (Auth::guard('customer')->user()->gender == 'male')
                            <input id="radio-1" name="gender" type="radio" value="male" checked="checked">
                            <label for="radio-1" class="radio-label">Anh</label>
                            <!-- Nếu khách hàng là nữ -->
                            @elseif(Auth::guard('customer')->user()->gender == 'female')
                            <input id="radio-1" name="gender" type="radio" value="female" checked="checked">
                            <label for="radio-1" class="radio-label">Chị</label>
                            <!-- Khách hàng không xác định giới tính -->
                            @else
                            <input id="radio-1" name="gender" type="radio" value="male" checked="checked">
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
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Tên">
                        @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" name="phone" value="{{Auth::guard('customer')->user()->phone}}" placeholder="Điện thoại">
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" name="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                    </div>
                  </div>
                </div>
                @endauth
                <!-- Phần thông tin cá nhân nếu là khách -->
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
                            <input id="radio-1" name="gender" type="radio" checked="{{(!session()->get('cart.gender') || session()->get('cart.gender') == 'male') ? 'checked' : ''}}" value="male">
                            <label for="radio-1" class="radio-label">Anh</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="radio">
                            <input id="radio-2" name="gender" type="radio" checked="{{(session()->get('cart.gender') == 'female') ? 'checked' : ''}}" value="female">
                            <label for="radio-2" class="radio-label" >Chị</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" placeholder="Họ và tên" name="name" value="{{session()->get('cart.name')}}">
                        @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" placeholder="Điện thoại" name="phone" value="{{session()->get('cart.phone')}}">
                        @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" placeholder="Địa chỉ email" name="email" value="{{session()->get('cart.email')}}">
                        @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                @endguest
              </div>
            </div>
          </div>
          <div class="process-info">
            <h2 class="process-info-title">Địa chỉ nhận hàng</h2>
            <div class="process-profile">
              <div class="row no-gutters">
                <div class="col-12">
                  <div class="process-profile-detail">
                    <div class="process-profile-block-sub">
                      <div class="row">
                        <div class="col-md-6">
                        <!-- Phần thông tin địa chỉ nhận hàng nếu là khách -->
                          @guest('customer')
                          @include('includes.address-form-guest')
                        @endguest

                        <!-- Phần thông tin địa chỉ nhận hàng nếu là khách hàng -->
                        @auth('customer')
                        @php
                        $address = Auth::guard('customer')->user()->addresses()->where('is_primary',1)->first();
                        @endphp
                        <!-- Nếu khách hàng có địa chỉ mặc định -->
                      @if($address)
	<div class="form-group selected-box">
                            <select class="form-control" name="city" id="exampleFormControlSelect1" >
                              <option value="{{$address->matp}}" >{{$address->city->name}}</option>
                            </select>
                            <input type="hidden" name="city" value="{{$address->matp}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" name="district">
                              <option value="{{$address->maqh}}" >{{$address->district->name}}</option>
                            </select>
                            <input type="hidden" name="district" value="{{$address->maqh}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group selected-box">
                            <select class="form-control" id="exampleFormControlSelect1" name="ward">
                              <option value="{{$address->maphuong}}" >{{$address->ward->name}}</option>
                            </select>
                            <input type="hidden" name="ward" value="{{$address->maphuong}}">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input name="address" type="text" class="form-control" id="inputAddress" aria-describedby="inputName" value="{{$address->address}}">
                            <input type="hidden" name="address" value="{{$address->address}}">
                          </div>
                        </div>
                        <!-- Nếu khách hàng không có địa chỉ mặc định -->
                      @else
                      @include('includes.address-form-guest')
                      @endif
                        @endauth
                        <div class="col-12">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lời nhắn cho OneStopShop.vn" name="note">{{session()->get('cart.note') ?? ''}}</textarea>
                            @error('note')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		  
          <div class="process-info action">
            <div class="text-right">
              <button type="submit" class="btn-submit form-checkout">Tiếp theo <i class="icon icon-arrow-right"></i></button>
            </div>
          </div>
		  
        </form>
      </section>
    </div>

@endif
@section('script')
<?php 
$old_district = session()->get('cart.district'); 
      $old_city = session()->get('cart.city');
      $old_ward = session()->get('cart.ward');
?>
<script>
  // $('form').submit(function(e) {
  // 	$(':disabled').each(function(e) {
  // 		$(this).removeAttr('disabled');
  // 	})
  // });
  function updateDistrict(matp)
  {
    $.ajax({
    type: 'POST',
    url: "{{route('front.getquan')}}",
    data: {'_token':'{{csrf_token()}}', 'matp': matp},
    success: function(data){
    $("select[name='district']").html(data.html);
    @if($old_district)
    $("select[name='district'] option[value='{{$old_district}}']").attr('selected','selected');
    @endif
    }
    });
  }
  
  function updateWard(maqh)
  {
    $.ajax({
    type: 'POST',
    url: "{{route('front.getphuong')}}",
    data: {'_token':'{{csrf_token()}}', 'maqh': maqh},
    success: function(data){
    $("select[name='ward']").html(data.html);
    @if($old_ward)
    $("select[name='ward'] option[value='{{$old_ward}}']").attr('selected','selected');
    @endif
    }
    });
  }
  
  $("select[name='city']").on('change',function()
  {
    var matp = $(this).val();
  updateDistrict(matp);
  });

  $("select[name='district']").on('change',function()
  {
    var maqh = $(this).val();
    updateWard(maqh);
  });

@if($old_city)
updateDistrict({{$old_city}});
updateWard({{$old_district}});
@else
$("select[name='city'] option[value='79']").attr('selected','selected');
updateDistrict(79);
@endif
</script>

@endsection