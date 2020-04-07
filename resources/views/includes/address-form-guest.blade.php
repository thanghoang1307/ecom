<div class="form-group selected-box">
    <select class="form-control" name="city" id="exampleFormControlSelect1" >
      <!--<option value="0" disabled selecte>Tỉnh/Thành</option>-->
      @foreach ($cities as $city)
          @if(!session()->get('cart.city'))
              <option value="{{$city->matp}}">{{$city->name}}</option>
          @else
          <option value="{{$city->matp}}" {{$city->matp == session()->get('cart.city') ? 'selected="selected"' : ''}}>{{$city->name}}</option>
          @endif
      @endforeach
    </select>
    @error('city')
	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
</div>
<div class="col-md-6">
  <div class="form-group selected-box">
    <select class="form-control" name="district"
    id="district"
    data-parsley-required-message="Quận/Huyện không được để trống"
	data-parsley-required='true'
	aria-describedby="district">
      <option value="0" disabled selected>Quận/Huyện</option>
      
    </select>
    @error('district')
	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
</div>
<div class="col-md-6">
  <div class="form-group selected-box">
    <select class="form-control" id="exampleFormControlSelect1" name="ward"
    id="ward"
    data-parsley-required-message="Phường/Xã không được để trống"
	data-parsley-required='true'
	aria-describedby="ward">
      <option value="0" disabled selected>Phường/Xã</option>
    </select>
    @error('ward')
	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input name="address" type="text" class="form-control" id="inputAddress" aria-describedby="inputAddress" placeholder="Số nhà, tên đường" value="{{session()->get('cart.address') ?? ''}}"
    data-parsley-required-message="Số nhà, tên đường không được để trống"
    data-parsley-required='true'>
    @error('address')
	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
</div>