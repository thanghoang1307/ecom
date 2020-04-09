@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'address'])
@endcomponent
            <div class="dashboard-body">
            <section id="profile-add-address">
              <div class="add-address-header">
                <h4 class="section-title">Thay đổi địa chỉ</h4>
              </div>
              <div class="add-address-body">
                <form method="POST" action="{{route('front.account.update_address',$address->id)}}" class="add-address-form" data-parsley-validate>
                  @csrf
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="text" class="form-control" name="receiver" placeholder="Họ và tên người nhận" value="{{$address->receiver}}"
                        id="inputReceiver"
                        data-parsley-required-message="Hãy nhập Họ và tên người nhận"
                        data-parsley-required='true'
                        aria-describedby="inputReceiver">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="number" class="form-control" name="phone" placeholder="Số điện thoại" value="{{$address->phone}}"
                        id="inputPhoneReceiver"
                        data-parsley-type="integer"
                        minlength="10"
						data-parsley-minlength="10"
						data-parsley-minlength-message="Số điện thoại phải là 10 chữ số"
                        data-parsley-required-message="Hãy nhập Số điện thoại"
                        data-parsley-required='true'
                        aria-describedby="inputPhoneReceiver">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ nhận hàng (Tầng, số nhà, đường)" value="{{$address->address}}"
                        	id="inputAddrInfo"
                        	data-parsley-required-message="Hãy nhập Số nhà, tên đường"
                        	data-parsley-required='true'
                        	aria-describedby="inputAddrInfo">
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group select-group">
                        <select class="form-control" name="city">
                          <option value="0" disabled>Tỉnh/Thành phố</option>
                          @foreach ($cities as $city)
                          <option value="{{$city->matp}}" 
                          	{{$address->matp == $city->matp ? 'selected' :''}}>{{$city->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group select-group">
                        <select name="district" class="form-control">
                          <option value="0" disabled>Quận/Huyện</option>
                          @foreach ($address->city->districts as $district)
							<option value="{{$district->maqh}}" 
                          	{{$address->maqh == $district->maqh ? 'selected' :''}}>{{$district->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-5">
                      <div class="form-group select-group">
                        <select class="form-control" name="ward">
                          <option value="0" disabled>Phường/Xã</option>
                          @foreach ($address->district->wards as $ward)
							<option value="{{$ward->maphuong}}" 
                          	{{$address->maphuong == $ward->maphuong ? 'selected' :''}}>{{$ward->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="form-group">
                        <div class="checkbox">
                          <input id="default-address" name="is_primary" type="checkbox" {{$address->is_primary ? 'checked' : ''}}>
                          <label for="default-address" class="checkbox-label">
                            Chọn làm địa chỉ mặc định
                          </label>
                        </div>
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
@section('script')
<script>
  $("select[name='city']").on('change',function(){
    var matp = $(this).val();
    $.ajax({
    type: 'POST',
    url: "{{route('front.getquan')}}",
    data: {'_token':'{{csrf_token()}}', 'matp': matp},
    success: function(data){
    $("select[name='district']").html(data.html).trigger('change');
    }
    });
  });

  $("select[name='district']").on('change',function(){
    var maqh = $(this).val();
    $.ajax({
    type: 'POST',
    url: "{{route('front.getphuong')}}",
    data: {'_token':'{{csrf_token()}}', 'maqh': maqh},
    success: function(data){
    $("select[name='ward']").html(data.html);
    }
    });
  });
</script>
@endsection