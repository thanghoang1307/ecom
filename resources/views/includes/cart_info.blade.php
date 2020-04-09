@if(session()->get('cart.items'))
<div class="col-md-6">
      <section class="cart-process">
        <div class="process-list d-none d-md-block">
          <ul class="process-list-wrapper">
            <li><a class="active"><span>Thông tin đặt hàng</span></a></li>
            <li><a><span class="d-none d-sm-block">Thanh toán</span></a></li>
            <li><a><span class="d-none d-sm-block">Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="{{route('front.check_out_2')}}" method="POST" data-parsley-validate>
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
                            <input id="radio-1" name="gender" type="radio" value="male" checked="checked" readonly="">
                            <label for="radio-1" class="radio-label">Anh</label>
                            <!-- Nếu khách hàng là nữ -->
                            @elseif(Auth::guard('customer')->user()->gender == 'female')
                            <input id="radio-1" name="gender" type="radio" value="female" checked="checked" readonly="">
                            <label for="radio-1" class="radio-label">Chị</label>
                            <!-- Khách hàng không xác định giới tính -->
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" name="name" readonly="" value="{{Auth::guard('customer')->user()->name}}" placeholder="Tên">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputPhone" aria-describedby="inputName" name="phone" readonly="" value="{{Auth::guard('customer')->user()->phone}}" placeholder="Điện thoại">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputName" name="email" readonly="" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email">
                      </div>
                    </div>
                  </div>
                </div>
                @endauth
                <!-- Phần thông tin cá nhân nếu là guest -->
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
                            <input id="gender-register-1" name="gender" type="radio" checked="{{(!session()->get('cart.gender') || session()->get('cart.gender') == 'male') ? 'checked' : ''}}" value="male">
                            <label for="gender-register-1" class="radio-label">Anh</label>
                          </div>
                        </div>
                        <div class="col-4">
                          <div class="radio">
                            <input id="gender-register-2" name="gender" type="radio" checked="{{(session()->get('cart.gender') == 'female') ? 'checked' : ''}}" value="female">
                            <label for="gender-register-2" class="radio-label" >Chị</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="process-profile-block-body">
                      <div class="form-group">
                        <input type="text" class="form-control" id="inputName" aria-describedby="inputName" placeholder="Họ và tên" name="name" value="{{session()->get('cart.name')}}">
                        <!--@error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->
                      </div>
                      <div class="form-group">
                        <input type="number" class="form-control" id="inputPhone" aria-describedby="inputPhone" placeholder="Điện thoại" name="phone" value="{{session()->get('cart.phone')}}"
                        data-parsley-type="integer"
                        minlength="10"
						data-parsley-minlength="10"
						data-parsley-minlength-message="Số điện thoại phải có ít nhất 10 chữ số"
                        data-parsley-required-message="Số điện thoại không được để trống và phải là số"
                        data-parsley-required='true'
                        aria-describedby="inputPhone">
						
                       <!-- @error('phone')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="inputEmail" placeholder="Địa chỉ email" name="email" value="{{session()->get('cart.email')}}"
                        id="inputEmail"
                        data-parsley-type="email"
                        data-parsley-type-message="Email chưa đúng định dạng"
                        data-parsley-required-message="Email không được để trống"
                        data-parsley-required='true'>
						
                        <!--@error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                        @enderror-->
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
			                        @include('includes.address-form-customer')
                            <!-- Nếu khách hàng không có địa chỉ mặc định -->
                            @else
                      	      @include('includes.address-form-guest')
                            @endif
					  @endauth
                        <div class="col-12">
                          <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Lời nhắn cho OneStopShop.vn" name="note">{{session()->get('cart.note') ?? ''}}</textarea>
                            <!--@error('note')
							<div class="alert alert-danger">{{ $message }}</div>
	                        @enderror-->
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
    console.log('ajax done')
    @if($old_district && !Auth::guard('customer')->check())
    $("select[name='district'] option[value='{{$old_district}}']").attr('selected','selected');
    @elseif(Auth::guard('customer')->check() && $address)
    console.log('auth')
    $("select[name='district'] option[value='{{$address->maqh}}']").attr('selected','selected');
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
    @if($old_ward && !Auth::guard('customer')->check())
    $("select[name='ward'] option[value='{{$old_ward}}']").attr('selected','selected');
    @elseif(Auth::guard('customer')->check() && $address)
    $("select[name='ward'] option[value='{{$address->maphuong}}']").attr('selected','selected');
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

@if($old_city && !Auth::guard('customer')->check())
updateDistrict({{$old_city}});
updateWard({{$old_district}});
@elseif(Auth::guard('customer')->check() && $address)
updateDistrict({{$address->matp}});
updateWard({{$address->maqh}});
@else
$("select[name='city'] option[value='79']").attr('selected','selected');
updateDistrict(79);
@endif
</script>
@endsection