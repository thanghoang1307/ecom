@extends('layouts.app')
@section('title')
Quản lý khách hàng
@endsection
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th width="10%">#</th>
							<th>Tên khách hàng</th>
							
							<th>Loại khách hàng</th>
							
							<th>Điện thoại</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach($merges as $customer)
						<?php $type = ($customer->password || $customer->provider) ? 'customer' : 'guest' ?>
						<tr>
							 <td>{{$loop->iteration}}</td>
							<td><a href="{{route('admin.customer.show',['type' => $type, 'id' => $customer->id])}}">{{$customer->name}}</a></td>
							
							<td>{{ $type == 'customer' ? 'Thành viên' : 'Khách'}}</td>
							
							<td>{{$customer->phone}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
</div>


@endsection
