@extends('layouts.app')
@section('title')
Danh sách đơn hàng
@endsection
@section('content')
    <!-- Main content -->
           <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Mã đơn hàng</th>
                      <th>Khách hàng</th>
                      <th>Giá trị</th>
                      <th>Tình trạng</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td><a href="{{route('admin.order.edit',$order->order_number)}}">{{$order->order_number}}</a></td>
                      <td>{{$order->customer->name}}</td>
                      <td>{{$order->total}}</td>
                      <td>
                      	@switch ($order->status)
                      	@case('1')
                      	Đang giao hàng
                      	@break
                      	@case('2')
						Đã giao hàng, chưa thu tiền
                      	@break
                      	@case('3')
                      	Đã thu tiền
                      	@break
                      	@default
                      	Chưa xử lý
                      	@endswitch
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{$orders->render()}}
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
