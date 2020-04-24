@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-shopping-cart"></i> Danh sách đơn hàng
@endsection
@section('content')
@php
$status = app('request')->input('status');
@endphp
<style>
	#page-top {
		padding-bottom: 0 !important;
	}

	#page-top .pagination {
		margin-bottom: 0 !important;
	}
</style>
<!-- Main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body" id="page-top">
				<div class="row">
					<div class="col-md-6 col-12">{{$orders->render()}}</div>
					<div class="col-md-6 col-12" style="text-align: right;">
						<div class="form-group">
							<label>Lọc theo</label>

							<select class="form-control status-filter" style="width: 50%; display: inline; margin-left: 10px;">
								<option {{ $status ? '' : 'selected="selected"' }} value=''>Tất cả tình trạng</option>
								<option {{ $status == '0' ? 'selected="selected"' : '' }} value="0">Chưa xử lý</option>
								<option {{ $status == 1 ? 'selected="selected"' : '' }} value="1">Đã xác nhận đơn hàng</option>
								<option {{ $status == 2 ? 'selected="selected"' : '' }} value="2">Đã giao hàng, chưa thu tiền</option>
								<option {{ $status == 3 ? 'selected="selected"' : '' }} value="3">Đã thu tiền</option>
								<option {{ $status == -1 ? 'selected="selected"' : '' }} value="-1">Hoàn trả sản phẩm</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="ajax-table">
				@include('admin.order.table')
			</div>
		</div>
	</div>
	<!-- /.col-md-6 -->
</div>
<!-- /.row -->
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