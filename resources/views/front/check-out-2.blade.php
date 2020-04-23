@extends('layouts.check-out')
@section('next','front.check_out_3')
@section('content')

<div id="one-stop-check-out" class="main check-out-page buoc-2">
  <div class="row no-gutters">
    @include('includes.cart_detail')
    @include('includes.cart_payment')
  </div>
</div>
<div class="ajax-loader d-none">
  <div class="loader"></div>
  <div class="loader-bg"></div>
</div>

@endsection

@section('script')
<script>
  window.onpageshow = function(event) {
    if (event.persisted) {
      window.location.reload(true);
    }
  };

  $(function() {
    $('.btn-submit').on('click', function() {
      $('.ajax-loader').removeClass('d-none');
    })
  })
</script>
@endsection