<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>

        <th>Mã đơn hàng</th>

        <th>Giá trị</th>

        <th>Tình trạng</th>

        <th>Ngày đặt hàng</th>
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
          @case('-3')
          Đơn hàng bị huỷ
          @break
          @case('4')
          Đã chuyển khoản
          @break
          @case('5')
          Đơn hàng đã hoàn tất
          @break
          @default
          Chưa xử lý
          @endswitch</td>
          <td>{{date_format($order->created_at,'H:i d-m-Y')}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- /.card-body -->
<div class="card-footer clearfix">{{$orders->appends(request()->input())->links()}}</div>