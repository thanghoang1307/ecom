<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../assets/img/favicon.ico">

  <title>One Stop Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<!--HEADER-->
<header id="Header" class="header-wrapper d-none d-md-block">
  <div class="header-brand">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-1">
          <div class="text-center">
            <a href="{{route('front.index')}}" class="btn-back"><i class="icon icon-nav-left"></i></a>
          </div>
        </div>
        <div class="col-11 col-sm-4">
            <a href="{{route('front.index')}}"><img src="assets/img/logo.png" class="img-fluid" alt=""></a>
        </div>
        <div class="col-12 col-sm-7">
          <div class="page-contact">
            <div class="text-right">
              <p>Bạn gặp khó khăn khi đặt hàng? Hãy gọi ngay</p>
              <strong>0837 000 247</strong>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="header-wrapper-mobile d-block d-md-none">
  <div class="header-brand-mobile">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-1">
          <div class="text-center">
            <a href="{{route('front.index')}}" class="btn-back"><i class="icon icon-nav-left"></i></a>
          </div>
        </div>
        <div class="col-11">
          <h2 class="view-cart-title">Xem giỏ hàng</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--END HEADER-->
@yield('content')
<!--END FOOTER-->
<script src="{{asset('assets/js/main.js')}}"></script>
<script>
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $(function(){ 
  $('.price').each(function(){
    $(this).html(numberWithCommas($(this).html()));
  });
  });
</script>
<script>
  function ajaxUpdateCart(data){
    $.ajax({
    type: 'POST',
    url: "{{route('front.ajax_update_cart')}}",
    data: {'_token':'{{csrf_token()}}', 'qty': data.qty, 'prd_id': data.prd_id},
    success: function(data){
      console.log(data);
    $('.last-price').html(numberWithCommas(data.total) + "đ");
    }
    });
  }

  function ajaxRemoveItem(prd_id){
    $.ajax({
    type: 'POST',
    url: "{{route('front.ajax_remove_item')}}",
    data: {'_token':'{{csrf_token()}}', 'prd_id': prd_id},
    success: function(data){
      console.log(data);
    $('.last-price').html(numberWithCommas(data.total) + "đ");
    }
    });
  }

  $(function(){ 
  $('.prd-qty').on('click','.minus',function(){
  if ($(this).next().val() > 1 ){
  $(this).next().val(+$(this).next().val() - 1);
  var data = {
  prd_id: $(this).next().attr('prd-id'),
  qty: $(this).next().val()};
  ajaxUpdateCart(data);
  }
  });
  $('.prd-qty').on('click','.plus',function(){
  
  $(this).prev().val(+$(this).prev().val() + 1);
  var data = {
  prd_id: $(this).prev().attr('prd-id'),
  qty: $(this).prev().val()};
  ajaxUpdateCart(data);
  });

  $('.prd-qty').on('keyup','input',function(){
  var data = {
  prd_id: $(this).attr('prd-id'),
  qty: $(this).val()};
  ajaxUpdateCart(data);
  });

  $('.btn-remove-item').on('click',function(){
$(this).parents('div.cart-item').remove();
$prd_id = $(this).attr('prd-id');
ajaxRemoveItem($prd_id);
  });
  });

  $("select[name='city']").on('change',function(){
    var matp = $(this).val();
    $.ajax({
    type: 'POST',
    url: "{{route('front.getquan')}}",
    data: {'_token':'{{csrf_token()}}', 'matp': matp},
    success: function(data){
    $("select[name='district']").html(data.html);
    }
    });
  });

  $("select[name='district']").on('change',function(){
    var maqh = $(this).val();
    $.ajax({
    type: 'POST',
    url: "{{route('front.getphuong')}}",
    data: {'_token':'{{csrf_token()}}', 'maqh': maqh},
    success: function(data){
    $("select[name='ward']").html(data.html);
    }
    });
  });
</script>
</body>
</html>