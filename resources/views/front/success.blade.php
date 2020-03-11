@extends('layouts.check-out')
@section('content')
<div id="one-stop-check-out" class="main check-out-page">
  <div class="row no-gutters">
    <div class="col-md-6">
      <section class="cart-info">
      	@foreach($order->prds as $prd)
        <div class="cart-item">
          <div class="row">
            <div class="col-5 col-md-3">
              <div class="cart-image">
                <figure>
                  <img src="assets/img/product/item/1.jpg">
                </figure>
              </div>
            </div>
            <div class="col-7 col-md-9">
              <div class="row">
                <div class="col-md-8">
                  <div class="cart-detail">
                    <h6><a href="{{route('front.product-detail',$prd->slug)}}">{{$prd->name}}</a></h6>
                    <h6><span>Mã sản phẩm: <a href="{{route('front.product-detail',$prd->slug)}}" class="cart-code">{{$prd->sku}}</a></span></h6>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="cart-price">
                    <div class="text-right">
                      <span class="active-price price">{{$prd->pivot->price}}đ</span>
                    </div>
                    @if ($prd->sale_price)
                    <div class="text-right">
                      <span class="pre-active-price price">{{$prd->regular_price}}đ</span>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row align-items-center align-content-center">
                <div class="col-8 col-md-6">
                  <div class="text-right">
                    <div class="btn-group" role="group">
                      <input disabled type="text" class="form-control" value="1" placeholder="1"
                             aria-label="Input group example" aria-describedby="btnGroupAddon">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <!-- Total -->
        <div class="cart-item d-block d-md-none">
          <div class="row align-items-center align-content-center">
            <div class="col-6">
              <h2 class="cart-info-sub-title"><strong>Tổng cộng</strong></h2>
            </div>
            <div class="col-6">
              <div class="cart-price">
                <div class="cart-price">
                  <div class="text-right">
                    <span class="last-price price">{{$order->total}}đ</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="cart-pdf">
      	<!-- Total -->
      	<div class="cart-item d-none  d-md-block">
      	  <div class="row align-items-center align-content-center">
      	    <div class="col-6">
      	      <h2 class="cart-info-sub-title"><strong>Tổng cộng</strong></h2>
      	    </div>
      	    <div class="col-6">
      	      <div class="cart-price">
      	        <div class="cart-price">
      	          <div class="text-right">
      	            <span class="last-price price">{{$order->total}}đ</span>
      	          </div>
      	        </div>
      	      </div>
      	    </div>
      	  </div>
      	</div>
      	
      	<!-- Proposal -->
          <div class="cart-item">
            <div class="row no-gutters align-items-center align-content-center">
              <div class="col-4 col-md-12">
                <a href="#" class="btn-submit is-white">
                  <span class="d-none d-md-block">Tải về file báo giá (.pdf)</span>
                  <span class="d-block d-md-none">Tải báo giá</span>
                </a>
              </div>
              <div class="col-8">
                <a href="#" class="btn-submit d-block d-md-none">
                  <span>Tiến hành thanh toán</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    </div>
    <div class="col-md-6">
      <section class="cart-process">
        <div class="process-list">
          <ul class="process-list-wrapper">
            <li><a href="#" class="active"><span class="d-none d-sm-block">Thông tin đặt hàng</span></a>
            </li>
            <li><a href="#" class="active"><span class="d-none d-sm-block">Thanh toán</span></a></li>
            <li><a href="#" class="active"><span>Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="#">
          <div class="process-info">
            <div class="process-profile">
              <div class="row no-gutters">
                <div class="col-12">
                  <div class="process-profile-success">
                    <div class="row no-gutters align-items-center">
                      <div class="col-3">
                        <div class="process-profile-success-img">
                          <img src="assets/img/icon/sale-icon.png" width="80" alt="">
                        </div>
                      </div>
                      <div class="col-9">
                        <div class="process-profile-success-code">
                          <p class="process-profile-success-code-pre">Cám ơn bạn <strong>{{Auth::guard('customer')->check() ? $order->customer->name : $order->guest->name}}</strong> đã lựa
                            chọn mua hàng tại OneStopShop.vn</p>
                          <p class="process-profile-success-code-detail">
                            Đơn hàng số <a href="#">#{{$order->order_number}}</a> đã được tiếp nhận và đang được xử lý.
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="col-sm-6">
                        <div class="process-profile-success-about ">
                          <h6>Thông tin đơn hàng</h6>
                          <div class="row">
                            <div class="col-5">
                              <p>Mã đơn hàng</p>
                            </div>
                            <div class="col-7">
                              <p>#{{$order->order_number}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-5">
                              <p>Giá trị</p>
                            </div>
                            <div class="col-7">
                              <p class="price">{{$order->total}}đ</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="process-profile-success-about border-left">
                          <h6>Thông tin nhận hàng</h6>
                          <div class="row">
                            <div class="col-5">
                              <p>Họ và tên</p>
                            </div>
                            <div class="col-7">
                              <p>{{Auth::guard('customer')->check() ? $order->customer->name : $order->guest->name}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-5">
                              <p>Điện thoại</p>
                            </div>
                            <div class="col-7">
                              <p>{{Auth::guard('customer')->check() ? $order->customer->phone : $order->guest->phone}}</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-5">
                              <p>Địa chỉ</p>
                            </div>
                            <div class="col-7">
                              <p>{{$order->shipment->address}}, {{$order->shipment->ward->name}}, {{$order->shipment->district->name}}, {{$order->shipment->city->name}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="col-12">
                        <div class="process-profile-success-item border-top">
                          <p><strong>Phương thức thanh toán: </strong>{{$order->payment_type == 0 ? 'COD' : 'Chuyển khoản'}}</p>
                        </div>
                      </div>
                    </div>
                    @if ($order->is_vat)
                    <div class="row no-gutters">
                      <div class="col-12">
                        <div class="process-profile-success-item border-top">
                          <p><strong>Yêu cầu xuất hoá đơn GTGT đến </strong>{{$order->company->name}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="row no-gutters">
                      <div class="col-12">
                        <div class="process-profile-success-item border-top">
                          <p><strong>Ghi chú</strong> {{$order->company->note}}</p>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="process-info">
            <div class="row">
              <div class="col-12">
                <div class="text-center">
                  <a href="{{route('front.index')}}" class="btn-submit form-end">Tiếp tục mua sắm</a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
    </div>
  </div>
</div>
@endsection