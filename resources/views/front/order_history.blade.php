@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'order-history'])
@endcomponent
          <div class="dashboard-body" style="padding-bottom: 0">
            <section id="profile-order">
              <h4 class="section-title">Lịch sử đơn hàng</h4>
        	@if(!$orders)
                <div class="no-message">
                  <p>Bạn chưa có đơn hàng nào</p>
                </div>
            @else
              <div class="table-responsive order-table">
                <table class="table">
                  <thead>
                  <tr>
                    <th>Ngày</th>
                    <th>Mã đơn hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                  </tr>
                  </thead>
                  <tbody>
				@foreach (auth('customer')->user()->orders->paginate(10) as $order)
                  <tr>
                    <td>{{date('d/m/Y',strtotime($order->created_at))}}</td>
                      <td><a href="{{route('front.account.order_detail',$order->id)}}">#{{$order->order_number}}</a></td>
                      <td class="price">{{$order->total}}đ</td>
                      <td>
                        @switch ($order->status)
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
                        @endswitch
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              {{auth('customer')->user()->orders->paginate(10)->links('components.paginate')}}
              @endif
            </section>
          </div>
        </section>
        
      </div>
    </div>
  </div>
</main>
@endsection