@extends('layouts.front')
@section('content')
<main id="one-stop-product-list" class="main product-page">
  <div class="container">
    <section id="product-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
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
function ajaxFilter(){
  data = redirectParam();
  console.log(data);
  $.ajax({
  type:'POST',
  url: "{{route('front.prd_filter')}}",
  data: data,
  success: function(data){
  $('#product-list').html(data.html);
  $('.price').each(function(){
    $(this).html(numberWithCommas($(this).html()));
  });
  }
  });
}
function redirectParam(){
var brand_arr = [];
var price_arr = [];
$.each($("input[name='brand_checkbox']:checked"), function(){
brand_arr.push($(this).val());
});
$.each($("input[name='price_checkbox']:checked"), function(){
price_arr.push($(this).val());
});
var search = $('input[name="search"]').val();
var orderby = $('input[name="d_orderby"]:checked').val();
var data ={orderby: orderby};
if (search){
  data.search = search;
}
if (brand_arr.length){
  data.brand = brand_arr.join('_');
}

if (price_arr.length){
  data.price = price_arr.join('_');
}
data._token = '{{csrf_token()}}';
data.cat_id = '{{$cat->id}}';
return data;
}

$(function(){
$('#product-order').on('change','input[name="d_orderby"]',ajaxFilter);

$('.checkbox').on('change','input[type="checkbox"]',ajaxFilter);
});
</script>
@endsection