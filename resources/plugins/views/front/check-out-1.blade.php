@extends('layouts.check-out')
@section('content')
<div id="one-stop-check-out" class="main check-out-page">
  <div class="row no-gutters">
    @include('includes.cart_detail')
    @include('includes.cart_info')
  </div>
</div>
@endsection