@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'address'])
@endcomponent
<div class="dashboard-body">
	<section id="profile-address">
		<div class="row">
			@foreach ($addresses as $address)
			<div class="col-xs-12 col-sm-6">
				<div class="address-item">
					<div class="address-body">
						<ul class="address-list">
							<li>
								<i class="icon icon-user"></i>
								<span class="user-name">{{$address->receiver}}</span>
							</li>
							<li>
								<i class="icon icon-phone"></i>
								<span>{{$address->phone}}</span>
							</li>
							<li>
								<i class="icon icon-home"></i>
								<span>{{$address->address}}, {{$address->ward->name}}, {{$address->district->name}}, {{$address->city->name}}</span>
							</li>
						</ul>
					</div>
					<div class="address-footer">
						<div class="row">
							<div class="col-6">
							@if ($address->is_primary)
						<div class="tick-checkbox">
                            <div class="checkbox-label">
                              Địa chỉ mặc định
                            </div>
                          </div>
                          @endif
							</div>
							<div class="col-6">
								<form action="{{route('front.account.delete_address',$address->id)}}" method="POST">
									@csrf
									<button type="submit" class="btn-remove">Xóa</button>
								<a href="{{route('front.account.edit_address',$address->id)}}">
										<button type="button" class="btn-submit">Chỉnh sửa</button></a>
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="col-xs-12 col-sm-6">
					<a class="address-item add-address-item" href="{{route('front.account.add_address')}}">
						<span>+ Thêm địa chỉ</span>
					</a>
				</div>
			</div>
		</section>
	</div>
</section>
</div>
</div>
</div>
</main>
@endsection