@extends('layouts.front')
@section('content')
@component('components.profile_sidebar',['check' => 'order'])
@endcomponent
@if(auth('customer')->user()->orders->contains($order->id))
          <div class="dashboard-body" style="padding-bottom: 0">
            <section id="profile-order-detail">
              <div class="row">
                <div class="col-12">
                  <div class="order-detail">
                    <h4 class="section-title">Thông tin đơn hàng <span>#{{$order->order_number}}</span> <span
                        class="order-status">
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
                        </span></h4>
        
                    <div class="order-detail-body">
                      @foreach ($order->prds as $prd)
                      <div class="row">
                        <div class="col-3">
                          <div class="order-detail-image">
                            <figure>
                              <img src="{{$prd->thumb}}">
                            </figure>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="order-detail-info">
                                <h6><a href="{{route('front.product-detail',$prd->slug)}}">{{$prd->name}}</a></h6>
                                <h6 class="code">Mã sản phẩm: <a href="{{route('front.product-detail',$prd->slug)}}" class="order-code">{{$prd->sku}}</a></h6>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="order-price">
                                <div class="text-right">
                                  <span class="active-price price">{{$prd->pivot->total}}đ</span>
                                </div>
                              </div>
                              <div class="order-number">
                                <span>x{{$prd->pivot->qty}}</span>
                              </div>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="order-detail">
                    <h4 class="section-title">Địa chỉ nhận hàng</h4>
        
                    <div class="order-detail-body border-order">
                      <ul class="address-list">
                        <li>
                          <i class="icon icon-user"></i>
                          <span class="user-name">{{$order->customer->name}}</span>
                        </li>
                        <li>
                          <i class="icon icon-phone"></i>
                          <span>{{$order->customer->phone}}</span>
                        </li>
                        <li>
                          <i class="icon icon-home"></i>
                          <span>{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</span>
                        </li>
                      </ul>
                    </div>
                    @if($order->is_vat)
                    <div class="order-detail-body border-order">
                      <p><strong>Thông tin hóa đơn GTGT</strong></p>
                      <ul class="address-list">
                        <li>
                          <span class="user-name">{{$order->company->name}}</span>
                        </li>
                        <li>
                          <span class="user-name">{{$order->company->mst}}</span>
                        </li>
                        <li>
                          <span class="user-name">{{$order->company->phone}}</span>
                        </li>
                        <li>
                          <span class="user-name">{{$order->company->address}}</span>
                        </li>
						<li>
                          <span class="note">{{$order->company->note}}</span>
                        </li>
                      </ul>
                    </div>
                    <div class="order-detail-body">
                      <p><strong>Ghi chú:</strong> {{$order->note}}</p>
                    </div>
                    @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="order-detail">
                    <h4 class="section-title">Tổng quan</h4>
                    <div class="order-detail-body border-order">
                      <div class="row">
                        <div class="col-8">
                          <p>Phương thức thanh toán</p>
                        </div>
                        <div class="col-4">
                          <p class="text-right"><strong>{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</strong></p>
                        </div>
                      </div>
                    </div>
                    <div class="order-detail-body border-order">
                      <div class="row">
                        <div class="col-8">
                          <p><strong>Tổng tiền đơn hàng</strong></p>
                        </div>
                        <div class="col-4">
                          <p class="text-right"><span class="main-color price">{{$order->total}}đ</span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </section>
        
      </div>
    </div>
  </div>
</main>
@else
<div class="text-center py-5" style="font-size:20px;color:red;"><strong>Bạn không có quyền truy cập trang này</strong></div>
@endif
@endsection
