@extends('layouts.app')
@section('title')
Thông tin đơn hàng {{$order->order_number}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
              <form action="{{route('admin.order.update',$order->order_number)}}" method="POST">
              @csrf
            <div class="card">
              <div class="card-header">
                <button type="submit" class="btn btn-primary">Luu</button>
              </div>
              <div class="card-body">

<div><strong>Tinh trang: </strong>

<select name="status" id="">
  <option value="0" {{$order->status == 0 ? "selected" : ""}}>Chưa xử lý</option>
  <option value="1" {{$order->status == 1 ? "selected" : ""}}>Đang giao hàng</option>
  <option value="2" {{$order->status == 2 ? "selected" : ""}}>Đã giao hàng, chưa thu tiền</option>
  <option value="3" {{$order->status == 3 ? "selected" : ""}}>Đã thu tiền</option>
</select>
</form>
</div>
<div>
<h4>Thông tin khách hàng</h4>
<div><strong>Họ và tên: </strong> {{$order->customer->gender == 'male'? 'Anh' : 'Chị'}} {{$order->customer->name}}</div>
<div><strong>Điện thoại: </strong>{{$order->customer->phone}}</div>
<div><strong>Email: </strong>{{$order->customer->email}}</div>
</div>
<div>
<h4>Chi tiet don hang</h4>
<table class="table table-bordered">
  <thead>
    <th>STT</th>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Đơn giá</th>
    <th>Số lượng</th>
    <th>Tổng</th>
  </thead>
  <tbody>
    @foreach($order->prds as $prd)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$prd->sku}}</td>
      <td>{{$prd->name}}</td>
      <td class="price">{{$prd->pivot->price}}</td>
      <td>{{$prd->pivot->qty}}</td>
      <td><span class="price">{{$prd->pivot->total}}đ</span></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div><strong>Phuong thuc thanh toan: </strong>{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</div>
</div>
<div>
<h4>Thong tin giao hang</h4>
<div><strong>Dia chi: {{$order->shipment->address}}, {{$order->shipment->ward}}, {{$order->shipment->district}}, {{$order->shipment->city}}</strong></div>
<div><strong>Ghi chu: {{$order->shipment->note}}</strong></div>
</div>
@if ($order->is_vat)
<div>
<h4>Thong tin xuat hoa don</h4>
<div><strong>Ten cong ty: {{$order->company->name}}</strong></div>
<div><strong>Ma so thue: {{$order->company->mst}}</strong></div>
<div><strong>Dia chi: {{$order->company->address}}</strong></div>
<div><strong>Ghi chu: {{$order->company->note}}</strong></div>
</div>
@endif
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-primary">Luu</button>
</div>
            </div>
          </form>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
@section('modal')

@endsection
