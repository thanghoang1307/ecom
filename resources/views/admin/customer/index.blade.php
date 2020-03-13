@extends('layouts.app')
@section('content')
<table class="table table-bordered">
	<thead>
		<tr>
		<th>Tên khách hàng</th>
		<th>Loại khách hàng</th>
		<th>Điện thoại khách hàng</th>
		</tr>
	</thead>
	<tbody>
		@foreach($merges as $customer)
		<?php $type = ($customer->password || $customer->provider) ? 'customer' : 'guest' ?>
		<tr>
			<td><a href="{{route('admin.customer.show',['type' => $type, 'id' => $customer->id])}}">{{$customer->name}}</a></td>
			<td>{{ $type == 'customer' ? 'Khách hàng' : 'Khách'}}</td>
			<td>{{$customer->phone}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
