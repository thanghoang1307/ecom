@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'thong-tin'])
@endcomponent
          <div class="dashboard-body">
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <section id="profile-personal-info">
                  <div class="personal-info-header">
                    <h4 class="section-title">Thông tin cá nhân</h4>
                
                    <a href="{{route('front.account.edit')}}" class="btn-submit">Cập nhật</a>
                  </div>
                  <div class="personal-info-body">
                    <ul class="personal-info-list">
                      <li>
                        <i class="icon icon-user"></i>
                        <span class="user-name">{{auth('customer')->user()->name}}</span>
                      </li>
                      <li>
                        <i class="icon icon-phone"></i>
                        <span>{{auth('customer')->user()->phone}}</span>
                      </li>
                      <li>
                        <i class="icon icon-envelope"></i>
                        <span>{{auth('customer')->user()->email}}</span>
                      </li>
                    </ul>
                  </div>
                </section>
              </div>
              @if (auth('customer')->user()->addresses()->first())
              <div class="col-xs-12 col-sm-6">
                <section id="profile-shipping-address">
                  <div class="shipping-address-header">
                    <h4 class="section-title">Địa chỉ nhận hàng</h4>
                
                    <div class="shipping-address-default">Mặc định</div>
                  </div>
                  <div class="shipping-address-body">
                    <ul class="shipping-address-list">
                      <li>
                        <i class="icon icon-user"></i>
                        <span class="user-name">{{$primary_address->receiver}}</span>
                      </li>
                      <li>
                        <i class="icon icon-phone"></i>
                        <span>{{$primary_address->phone}}</span>
                      </li>
                      <li>
                        <i class="icon icon-home"></i>
                        <span>{{$primary_address->address}}, {{$primary_address->ward->name}}, {{$primary_address->district->name}}, {{$primary_address->city->name}}</span>
                      </li>
                    </ul>
                  </div>
                </section>
              </div>
              @else
              <div class="col-xs-12 col-sm-6">
                <section id="profile-shipping-address">
                  <div class="shipping-address-header">
                    <h4 class="section-title">Địa chỉ nhận hàng</h4>
                  </div>
                  <div class="page-divider"></div>
                  <div class="shipping-address-body">
                    <div class="no-message">
                      <p>Chưa có địa chỉ nhận hàng mặc định</p>
                      <a href="{{route('front.account.add_address')}}">+ Thêm địa chỉ</a>
                    </div>
                  </div>
                </section>
              </div>
              @endif
            </div>
        
            <section id="profile-recent-orders">
              <div class="recent-orders-header">
                <h4 class="section-title">Đơn hàng gần đây</h4>
              </div>
              <div class="recent-orders-body">
            @if(!auth('customer')->user()->orders)
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
                      @foreach(auth('customer')->user()->orders()->where('status','>=',-1)->orderBy('created_at','desc')->take(5)->get() as $order)
                    <tr>
                      <td>{{date('d/m/Y',strtotime($order->created_at))}}</td>
                      <td><a href="{{route('front.account.order_detail',$order->id)}}">#{{$order->order_number}}</a></td>
                      <td class="price">{{$order->total}}đ</td>
                      <td>@switch ($order->status)
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
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                @if(auth('customer')->user()->orders->count())
                <div class="text-right">
                  <a href="{{route('front.account.order_history')}}" class="btn-submit">Xem thêm</a>
                </div>
                @else
                <div class="text-center">
                  <em>Bạn chưa có đơn hàng nào</em>
                </div>
                @endif
            @endif
              </div>
            </section>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>
@endsection