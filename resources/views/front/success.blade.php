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
                  <img src="{{$prd->thumb}}">
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
					<div class="text-right">
                      <span class="">x{{$prd->pivot->qty}}</span>
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
        
        <div class="cart-pdf buoc-3">
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
          <!--<div class="cart-item">
            <div class="row no-gutters align-items-center align-content-center">
              <div class="col-4 col-md-12">
                <a href="{{route('front.tai_bao_gia')}}" target="_blank" class="btn-submit is-white">
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
          </div>-->
        </div>
      </section>
      
    </div>
    <div class="col-md-6">
      <section class="cart-process">
        <div class="process-list">
          <ul class="process-list-wrapper">
            <li><a class="active"><span class="d-none d-sm-block">Thông tin đặt hàng</span></a>
            </li>
            <li><a class="active"><span class="d-none d-sm-block">Thanh toán</span></a></li>
            <li><a class="active"><span>Hoàn tất đơn hàng</span></a></li>
          </ul>
        </div>
        <form action="#">
          <div class="process-info">
            <div class="process-profile">
              <div class="row no-gutters">
                <div class="col-12">
                  <div class="process-profile-success">
                    <div class="row no-gutters align-items-center">
                      <div class="col-4">
                        <div class="process-profile-success-img">
                          <img src="{{asset('assets/img/icon/sale-icon.png')}}" width="80" alt="">
                        </div>
                      </div>
                      <div class="col-8">
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
          <div class="process-info action">
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

@section('script')
<script>
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
	window.sessionStorage.setItem("success-page", window.location.href);
	//alert('success:'+sessionStorage.getItem("success-page"));
}
</script>
@endsection