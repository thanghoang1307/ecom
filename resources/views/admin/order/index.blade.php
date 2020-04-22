@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-shopping-cart"></i>  Danh sách đơn hàng
@endsection
@section('content')

<style>
#page-top {
	padding-bottom: 0!important;
}

#page-top .pagination {
	margin-bottom: 0!important;
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
							
							<select class="form-control" style="width: 50%; display: inline; margin-left: 10px;">
								<option selected="">Tất cả tình trạng</option>
								
								<option>Chưa xử lý</option>
								<option>Đã xác nhận đơn hàng</option>
								<option>Đã giao hàng, chưa thu tiền</option>
								<option>Đã thu tiền</option>
								<option>Hoàn trả sản phẩm</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 10px">#</th>
							
							<th>Mã đơn hàng</th>
							
							<th>Giá trị</th>
							
							<th>Tình trạng</th>
						</tr>
					</thead>
					
					<tbody>
	                    @foreach ($orders as $order)
						<tr>
							<td>{{$loop->iteration}}</td>
							
							<td><a href="{{route('admin.order.edit',$order->order_number)}}">{{$order->order_number}}</a></td>
							
							<td class="price">{{$order->total}}</td>
							
							<td>@switch ($order->status)
		                      	@case('1')
		                      	Đã xác nhận đơn hàng
		                      	@break
		                      	@case('2')
								Đã giao hàng, chưa thu tiền
		                      	@break
		                      	@case('3')
		                      	Đã thu tiền
		                      	@break
		                        @case('-1')
		                        Hoàn trả sản phẩm
		                        @break
		                      	@default
		                      	Chưa xử lý
		                      	@endswitch</td>
						</tr>
	                    @endforeach
					</tbody>
				</table>
			</div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">{{$orders->render()}}</div>
		</div>
	</div>
    <!-- /.col-md-6 -->
</div>
        <!-- /.row -->
@endsection
