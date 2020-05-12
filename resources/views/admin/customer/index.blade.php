@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-id-card"></i>Danh sách Khách hàng
@endsection
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6"></div>
				<div class="col-md-6 col-12" style="text-align: right;">
						<div class="form-group">
							<label>Lọc theo</label>
							<select class="form-control status-filter" style="width: 50%; display: inline; margin-left: 10px;">
								<option value="active" {{ app('request')->input('status') == 'active' || app('request')->input('status') ? 'selected="selected"' : '' }}>Đang hoạt động</option>
								<option value="inactive" {{ app('request')->input('status') == 'inactive' ? 'selected="selected"' : '' }}>Đã vô hiệu</option>
							</select>
						</div>
					</div>
				</div>
			</div>
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
						@foreach($customers as $customer)
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
			<div class="card-footer clearfix">{{$customers->appends(request()->input())->links()}}</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$(function() {
		$('select.status-filter').on('change', redirectParam);
	});

	function redirectParam() {
		var status = $(this).children("option:selected").val();
		var param = '?status=' + status;
		const url = 'http://' + window.location.hostname + ':' + window.location.port + window.location.pathname;
		window.location.href = url + param;
	}
</script>
@endsection
