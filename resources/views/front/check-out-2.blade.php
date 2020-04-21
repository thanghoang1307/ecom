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
onload=function(){
var e=document.getElementById("refreshed");
if(e.value=="no") {e.value="yes";}
else{ e.value="no";location.reload();}
}
</script>
@endsection