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

  <title>OneStopShop.vn - Giải Pháp | Thiết Bị CNTT</title>

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-579KXRM');
  </script>
  <!-- End Google Tag Manager -->

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
            <a href="{{route('front.index')}}"><img src="{{$settings->find('logo')->value}}" class="img-fluid" alt=""></a>
          </div>
          <div class="col-12 col-sm-7">
            <div class="page-contact">
              <div class="text-right">
                <p>Bạn gặp khó khăn khi đặt hàng? Hãy gọi ngay</p>
                <strong><a style="color: white;" href="tel:{{$settings->find('phone')->value}}">{{$settings->find('phone')->value}}</a></strong>
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
  <!-- Site JS -->
  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('assets/js/jquery.bootstrap-autohidingnavbar.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('assets/js/parsley.min.js')}}"></script>
  <script src="{{asset('assets/js/slick.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/parallax.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/js/sticky-sidebar.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap-multiselect.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
    function numberWithCommas(x) {
      return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    $(function() {
      $('.price').each(function() {
        $(this).html(numberWithCommas($(this).html()));
      });
    });
  </script>
  <script>
    function ajaxUpdateCart(data) {
      $.ajax({
        type: 'POST',
        url: "{{route('front.ajax_update_cart')}}",
        data: {
          '_token': '{{csrf_token()}}',
          'qty': data.qty,
          'prd_id': data.prd_id
        },
        success: function(data) {
          console.log(data);
          $('.last-price').html(numberWithCommas(data.total) + "đ");
        }
      });
    }

    function ajaxRemoveItem(prd_id) {
      $.ajax({
        type: 'POST',
        url: "{{route('front.ajax_remove_item')}}",
        data: {
          '_token': '{{csrf_token()}}',
          'prd_id': prd_id
        },
        success: function(data) {
          console.log(data);
          $('.last-price').html(numberWithCommas(data.total) + "đ");
        }
      });
    }

    $(function() {
      $('.prd-qty').on('click', '.minus', function() {
        if ($(this).next().val() > 1) {
          $(this).next().val(+$(this).next().val() - 1);
          var data = {
            prd_id: $(this).next().attr('prd-id'),
            qty: $(this).next().val()
          };
          ajaxUpdateCart(data);
        }
      });
      $('.prd-qty').on('click', '.plus', function() {

        $(this).prev().val(+$(this).prev().val() + 1);
        var data = {
          prd_id: $(this).prev().attr('prd-id'),
          qty: $(this).prev().val()
        };
        ajaxUpdateCart(data);
      });

      $('.prd-qty').on('keyup', 'input', function() {
        var data = {
          prd_id: $(this).attr('prd-id'),
          qty: $(this).val()
        };
        ajaxUpdateCart(data);
      });

      $('.btn-remove-item').on('click', function() {

        if ($('.product').length > 1) {
          $(this).parents('div.cart-item').remove();
          $prd_id = $(this).attr('prd-id');
          ajaxRemoveItem($prd_id);
        } else if ($('.product').length = 1) {

          if (confirm("Bạn chỉ còn 1 sản phẩm trong giỏ hàng. Bạn có chắc chắn muốn xoá?")) {
            $prd_id = $(this).attr('prd-id');
            $(this).parents('div.cart-item').remove();
            ajaxRemoveItem($prd_id);

            $('.form-checkout').addClass('d-none');
            $('.bao-gia').addClass('d-none');
            //			$('.cart-process').addClass('d-none');    
            $('.no-item').removeClass('d-none');

          } else {
            return false;
          }

        }
      });
    });

//var url = window.location.href;
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
	window.sessionStorage.setItem("cart-page", window.location.href);
	//alert('cart:'+sessionStorage.getItem("cart-page"));
}
  </script>
</body>

</html>
@yield('script')