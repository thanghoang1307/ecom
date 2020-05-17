@extends('layouts.app')
@section('title')
Thông tin đơn hàng #{{$order->order_number}}
@endsection
@section('content')

<!-- Main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			@if($order->status != 5 && $order->status != -3)
				<div class="card-header">
				<form style="display:inline;" action="{{route('admin.order.success',$order->id)}}" method="POST">@csrf
					<button type="submit" class="btn btn-success">Hoàn tất đơn hàng</button>
				</form>
				
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-cancel">Huỷ đơn hàng</button>
			</div>
			@endif
			
			<div class="card-body">
				@if($order->status == 5)
				<div>Đơn hàng đã hoàn tất</div>
				@elseif($order->status == -3)
				
				<div>Đơn hàng đã bị huỷ</div>
				
				<div>Lý do huỷ đơn: {{$order->cancel_reason}}</div>
				@else
				
				<div>
					<form action="{{route('admin.order.update',$order->order_number)}}" method="POST">
					@csrf
					<h4>Tình trạng đơn hàng </h4>
						
					<div style="margin: 10px 0;">
						<select name="status" id="">
							<option value="0" {{$order->status == 0 ? "selected" : ""}}>Chưa xử lý</option>
							
							<option value="1" {{$order->status == 1 ? "selected" : ""}}>Đã xác nhận đơn hàng</option>
							
							<option value="2" {{$order->status == 2 ? "selected" : ""}}>Đã giao hàng, chưa thu tiền</option>
							
							<option value="3" {{$order->status == 3 ? "selected" : ""}}>Đã thu tiền</option>
							
							<option value="4" {{$order->status == 4 ? "selected" : ""}}>Đã chuyển khoản</option>
							
							<option value="-1" {{$order->status == -1 ? "selected" : ""}}>Hoàn trả sản phẩm</option>
						</select>
					</div>
					<div><button type="submit" class="btn btn-primary">Lưu</button></div>
					</form>
				</div>
					@endif
					
					<hr />
					
					<div style="margin-top: 20px;">
						<h4>Thông tin khách hàng</h4>
						@if($order->customer_id)
						
						<div><strong>Họ và tên: </strong> {{$order->customer->gender == 'male'? 'Anh' : 'Chị'}} {{$order->customer->name}}</div>
						
						<div><strong>Loại:</strong> Thành viên</div>
						
						<div><strong>Điện thoại: </strong>{{$order->customer->phone}}</div>
						
						<div><strong>Email: </strong>{{$order->customer->email}}</div>
						@else
						
						<div><strong>Họ và tên: </strong> {{$order->guest->gender == 'male'? 'Anh' : 'Chị'}} {{$order->guest->name}}</div>
						
						<div><strong>Loại:</strong> Khách</div>
						
						<div><strong>Điện thoại: </strong>{{$order->guest->phone}}</div>
						
						<div><strong>Email: </strong>{{$order->guest->email}}</div>
						@endif
					</div>
					
					<hr />
					
					<div style="margin-top: 20px;">
						<h4>Chi tiết đơn hàng</h4>
						
						<table class="table table-bordered">
							<thead>
								<th width="2%">STT</th>
								
								<th width="15%">Mã sản phẩm</th>
								
								<th width="38%">Tên sản phẩm</th>
								
								<th width="10%" style="text-align: center;">Số lượng</th>
								
								<th width="10%" style="text-align: right;">Đơn giá</th>
								
								<th width="15%" style="text-align: right;">Tổng</th>
							</thead>
							
							<tbody>
								@foreach($order->prds as $prd)
								<tr>
									<td>{{$loop->iteration}}</td>
									
									<td>{{$prd->sku}}</td>
									
									<td>{{$prd->name}}</td>
									
									<td style="text-align: center;">{{$prd->pivot->qty}}</td>
									
									<td class="price" style="text-align: right;">{{$prd->pivot->price}}</td>
									
									<td style="text-align: right;"><span class="price">{{$prd->pivot->total}} <sup>đ</sup></span></td>
								</tr>
								@endforeach
								
								<tr>
									<td style="text-align: right;" colspan="5"><strong>Tổng đơn hàng</strong></td>
									
									<td class="price" style="text-align: right;"><strong>{{$order->total}}<sup>đ</sup></strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div style="margin-top: 20px;">
						<h4><strong>Phương thức thanh toán: </strong>{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</h4>
					</div>
					
					<hr />
					
					<div style="margin-top: 20px;">
						<h4>Thông tin giao hàng</h4>
						
						<div><strong>Địa chỉ: </strong>{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</div>
						
						<div><span style="text-decoration: underline;">Ghi chú đơn hàng:</span> <em>{{$order->shipment->note}}</em></div>
					</div>
		
					@if ($order->is_vat)
					
					<hr />
					
					<div style="margin-top: 20px;">
						<h4>Thông tin xuất hóa đơn GTGT</h4>
						
						<div>Tên công ty: <strong>{{$order->company->name}}</strong></div>
						
						<div>Mã số thuế: <strong>{{$order->company->mst}}</strong></div>
						
						<div>Địa chỉ: <strong>{{$order->company->address}}</strong></div>
						
						<div><span style="text-decoration: underline;">Ghi chú hoá đơn:</span> <em>{{$order->company->note}}</em></div>
					</div>
					@endif
					</div>
					@if($order->status != 5 && $order->status != -3)
					<div class="card-footer">
						<form style="display:inline;" action="{{route('admin.order.success',$order->id)}}" method="POST">@csrf
							<button type="submit" class="btn btn-success">Hoàn tất đơn hàng</button>
						</form>
						
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-cancel">Huỷ đơn hàng</button>
					</div>
					@endif
					</div>
				</form>
			</div>
			<!-- /.col-md-6 -->
		</div>
		<!-- /.row -->
		@endsection
		@section('modal')
		<div class="modal fade" id="modal-cancel" style="display: none;" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="{{route('admin.order.fail',$order->id)}}" method="POST">
						@csrf
						<div class="modal-header">
							<h4 class="modal-title">Huỷ đơn hàng</h4>
							
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						</div>
						
						<div class="modal-body">
							<textarea name="cancel_reason" placeholder="Lý do huỷ đơn" style="width:100%;"></textarea>
						</div>
						
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							
							<button type="submit" class="btn btn-danger">Huỷ đơn hàng</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		@endsection