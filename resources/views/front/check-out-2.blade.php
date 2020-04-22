@extends('layouts.check-out')
@section('next','front.check_out_3')
@section('content')

<div id="one-stop-check-out" class="main check-out-page buoc-2">
  <div class="row no-gutters">
    @include('includes.cart_detail')
    @include('includes.cart_payment')
  </div>
</div>

@endsection

@section('script')
<script>
  window.onpageshow = function(event) {
    if (event.persisted) {
      //	alert('Đơn hàng của bạn đã được đặt thành công, bạn không thể quay về để thay đổi được!');
      window.location.reload(); //reload page if it has been loaded from cache
    }
  };
</script>
@endsection