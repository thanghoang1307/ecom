@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-shopping-cart"></i> Danh sách đơn hàng
@endsection
@section('content')

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
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>Lọc theo</label>

							<select class="form-control status-filter" style="width: 50%; display: inline; margin-left: 10px;">
								<option selected="" value="all">Tất cả tình trạng</option>
								<option value="0">Chưa xử lý</option>
								<option value="1">Đã xác nhận đơn hàng</option>
								<option value="2">Đã giao hàng, chưa thu tiền</option>
								<option value="3">Đã thu tiền</option>
								<option value="-1">Hoàn trả sản phẩm</option>
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
		$('select.status-filter').on('change', function() {
			var status = $(this).children("option:selected").val();
			$.ajax({
				type: 'POST',
				url: "{{route('admin.order.filter')}}",
				data: {
					'_token': '{{csrf_token()}}',
					'status': status,
				},
				success: function(data) {
					console.log('success')
					$('.ajax-table').html(data.html);
				},
			});
		})
	})
</script>
@endsection