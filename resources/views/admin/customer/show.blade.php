@extends('layouts.app')

<?php $type = ($customer->password || $customer->provider) ? 'customer' : 'guest' ?>

@section('title')
Thông tin chi tiết {{ $type == 'customer' ? 'thành viên' : 'khách'}}
@endsection
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered">
					<tbody>
						<tr>
							<td width="30%">Họ và tên</td>
							<td>{{$customer->name}}</td>
						</tr>
						<tr>
							<td>Giới tính</td>
							<td>{{$customer->gender == 'male' ? 'Nam' : 'Nữ'}}</td>
						</tr>
						<tr>
							<td>Loại</td>
							<td>{{ $type == 'customer' ? 'Thành viên' : 'Khách'}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{$customer->email}}</td>
						</tr>
						<tr>
							<td>Điện thoại</td>
							<td>{{$customer->phone}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="card-footer">
				@if($customer->status == 'active')
				<form action="{{route('admin.customer.deactive',$customer->id)}}" method="POST">
					@csrf
					<button class="btn btn-danger">Vô hiệu hoá</button>
				</form>
				@else
				<form action="{{route('admin.customer.active',$customer->id)}}" method="POST">
					@csrf
					<button class="btn btn-success">Kích hoạt lại</button>
				</form>
				@endif
			</div>
		</div>
	</div>
</div>

@endsection