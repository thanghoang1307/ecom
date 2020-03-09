@extends('layouts.front')
@section('content')
<main id="one-stop-product-list" class="main product-page">
  <div class="container">
    <section id="product-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tất cả sản phẩm</li>
          </ol>
        </nav>
      </div>
      <h1 class="page-heading">Tất cả sản phẩm</h1>
    </section>
    @include('includes.desktop_order')
    @include('includes.mobile_order')
    <div class="row">
      <div class="col-lg-3 d-none d-lg-block">
        @include('includes.desktop_filter')
      </div>
      <div class="col-lg-9">
        <section id="product-list">
        @include('includes.product-loop-cat')
        </section>
      </div>
    </div>
  </div>
  <div class="page-gap"></div>
  @component('components.recently_view')
  @endcomponent
  <div class="page-gap"></div>
  @post
  <div class="page-gap"></div>
</main>
@endsection
@section('script')
<script>
  $(function(){
  $('#product-order').on('change','input[name="d_orderby"]',redirectParam);
  $('.checkbox').on('change','input[type="checkbox"]',redirectParam);
  });
</script>
<script>
function redirectParam(){
var brand_arr = [];
$.each($("input[name='brand_checkbox']:checked"), function(){
brand_arr.push($(this).val());
});
var price_arr = [];
$.each($("input[name='price_checkbox']:checked"), function(){
price_arr.push($(this).val());
});

var search = '{{app("request")->input("search")}}';

var param_arr = [];
param_arr.push('orderby=' + $('input[name="d_orderby"]:checked').val());
if (brand_arr.length){
  param_arr.push('brand=' + brand_arr.join('_'));
}

if (price_arr.length){
  param_arr.push('price=' + price_arr.join('_'));
}

if (search){
  param_arr.push('search='+search);
}

param = '?' + param_arr.join('&');
const url = 'http://' + window.location.hostname + ':' + window.location.port + window.location.pathname;
window.location.href = url + param;
};

$(function(){
$('#product-order').on('change','input[name="d_orderby"]',redirectParam);
$('.checkbox').on('change','input[type="checkbox"]',redirectParam);
});
</script>
@endsection