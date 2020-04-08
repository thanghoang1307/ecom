<div class="form-group selected-box">
    <select class="form-control" name="city" id="exampleFormControlSelect1" >
    @foreach ($cities as $city)
    <option value="{{$city->matp}}" {{$city->matp == $address->matp ? 'selected="selected"' : ''}}>{{$city->name}}</option>
    @endforeach
</select>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group selected-box">
    <select class="form-control" name="district"
    id="district"
    data-parsley-required-message="Quận/Huyện không được để trống"
    data-parsley-required='true'
    aria-describedby="district">
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
    </select>
	@error('ward')
	<div class="alert alert-danger">{{ $message }}</div>
	@enderror
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <input name="address" type="text" class="form-control" id="inputAddress" aria-describedby="inputAddress" value="{{$address->address}}"
    data-parsley-required-message="Số nhà, tên đường không được để trống"
    data-parsley-required='true'>
    <input type="hidden" name="address" value="{{$address->address}}">
  </div>
</div>