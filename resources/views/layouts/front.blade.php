<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/assets/img/favicon.ico">

  <title>One Stop Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="/assets/css/main.css" rel="stylesheet">
  <script src="https://getbootstrap.com/docs/4.1//assets/js/vendor/popper.min.js"></script>
</head>
<body>
<!--HEADER-->
<header id="Header" class="header-wrapper">
  <div class="header-top-banner d-none d-md-block">
    <div class="container">
      <a href="{{$top_banner->link}}"><img src="{{$top_banner->image}}" class="img-fluid" alt=""></a>
    </div>
  </div>
  <div class="header-user d-none d-lg-block">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-md-12">
          <ul class="nav justify-content-end header-user-list">
            <li class="nav-item">
              <a class="nav-link" href="tel:{{$settings->find('phone')->value}}">Hotline <span>{{$settings->find('phone')->value}}</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/chinh-sach-bao-hanh')}}">Bảo hành & Hỗ trợ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/thong-tin-lien-he')}}">Hỗ trợ trực tuyến</a>
            </li>
            <li class="nav-item">
              <a class="nav-link user-action" data-toggle="modal" data-target="#loginModal">Đăng nhập/ Đăng ký <i
                  class="icon icon-user-profile"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="header-brand">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <a href="{{route('front.index')}}" class="logo-brand"><img src="{{$settings->find('logo')->value}}" class="img-fluid" alt=""></a>
          <div class="d-none d-md-block">
            <a href="#" class="toggle-category">
              <i class="icon icon-align-justify"></i>
            </a>
          </div>
          <div class="d-block d-lg-none">
            <a href="#" class="user-action-toggle">
              <i class="icon icon-user-profile"></i>
            </a>
          </div>
        </div>
        <div class="col-11 col-md-5">
          <!-- Start Side Menu -->
          <a class="menu-toggle" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="false"
             aria-controls="collapseMenu">
            <span class="menu-toggle-grippy">Toggle</span>
          </a>
          <!-- End Side Menu -->
          <div class="header-brand-search-wrapper">
            <form action="#" class="header-brand-search">
              <div class="row no-gutters align-items-center">
                <div class="col-lg-4 d-none d-lg-flex d-lg-block">
                  <div class="header-brand-search-filter">
                    <a href="#" class="header-brand-search-filter-btn dropdown-toggle" id="dropdownFilterButton"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownFilterButton">
                      @foreach ($cats as $cat)
                      <li class="dropdown-item">{{$cat->short_name}}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="col-10 col-lg-7">
                  <div class="header-brand-search-input">
                    <input type="text" class="form-control" aria-label="Tìm kiếm sản phẩm" placeholder="Tìm kiếm sản phẩm">
                  </div>
                </div>
                <div class="col-2 col-lg-1">
                  <a href="#" class="header-brand-search-action"><i class="icon icon-search"></i></a>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-1 col-md-3">
          <div class="text-right">
            <!--USER ACTION-->
            <a class="user-cart d-none d-md-inline-block" href="#"><span>Đăng nhập/ Đăng ký <i
                class="icon icon-user-head"></i></span></a>
            <!--USER LOGIN-->
            <span class="cart-title d-none d-md-inline-block">Giỏ hàng</span>
            <div class="dropdown dropdown-discount">
              <a class="highlight d-block d-md-none" href="{{route('front.check_out_1')}}">
                <span class="header-cart-number">{{session()->get('cart') ? count(session()->get('cart')) : 0}}</span>
                <i class="icon icon-shopping-cart"></i>
              </a>
              
              <a class="highlight d-none d-md-block" href="{{route('front.check_out_1')}}" id="dropdownMenuButton" data-toggle="dropdown"
                 aria-haspopup="true"
                 aria-expanded="false">
                <span class="header-cart-number">{{session()->get('cart') ? count(session()->get('cart')) : 0}}</span>
                <i class="icon icon-shopping-cart"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <?php $cart_total = 0; ?>
                @foreach ($prds_in_cart as $prd)
                <li class="dropdown-item">
                  <div class="product-head">
                    <a href="#" class="card-image">
                      <img src="{{$prd->thumb}}" class="img-fluid">
                    </a>
                    <h3 class="product-head-title"><a href="product-detail.html">Phần mềm Windows 10 Home 64bit ENG
                      (KW9-00139) Phần mềm
                      Windows 10 Home 64bit ENG (KW9-00139)</a></h3>
                    <span class="product-price price">{{$prd->sale_price ? $prd->sale_price*$carts[$prd->id] : $prd->regular_price*$carts[$prd->id]}}đ</span>
                  </div>
                </li>
                @php
                if ($prd->sale_price){
                $cart_total += $prd->sale_price*$carts[$prd->id];
              } else {
              $cart_total += $prd->regular_price*$carts[$prd->id];
            }
                @endphp
                @endforeach
                <li class="dropdown-item">
                  <div class="product-end">
                    <h5 class="product-end-block"><span class="product-end-title">Thành tiền</span> <span
                        class="product-end-block-price price">{{$cart_total}}đ</span></h5>
                    <a href="{{route('front.check_out_1')}}" class="view-all-product">Xem giỏ hàng</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-none d-md-block">
    <div class="header-category">
      <div class="container">
        <div class="row align-items-center">
          @foreach ($cats as $cat)
          <div class="col-sm">
            <a class="header-category-item" href="{{route('front.category-list',$cat->slug)}}">
              <i class="icon icon-{{$cat->icon}}"></i><span>{{$cat->short_name}}</span>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</header>
<!--END HEADER-->
<div class="collapse hidden-mobile" id="collapseMenu">
  <div class="hidden-panel-content">
    <a href="product-list.html" class="product-navigation-action">
      <i class="icon icon-align-justify"></i> Danh mục sản phẩm
    </a>
    <ul class="hidden-panel-content-menu">
    @foreach ( $cats as $cat )
      <li>
        <a class="header-category-item" href="{{route('front.category-list',$cat->slug)}}">
          <i class="icon icon-{{$cat->icon}}"></i> <span>{{$cat->name}}</span>
        </a>
      </li>
    @endforeach      
    </ul>
  </div>
</div>
@yield('content')
<!-- Modal -->
<div class="modal fade login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-form-nav">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <ul class="nav" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                 aria-selected="true">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register"
                 aria-selected="false">Đăng ký</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form action="#">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Số điện thoại/Email" id="inputUser"
                           aria-describedby="inputUser">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu" id="inputPassword"
                           aria-describedby="inputPassword">
                    <a href="#" class="forgot-password">Quên mật khẩu?</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <button class="btn-submit" type="submit">Đăng nhập</button>
                  <p class="form-sub-text">Hoặc bằng</p>
                  <div class="row">
                    <div class="col-6">

                      <button class="btn-facebook open-social-login">Facebook</button>
                    </div>
                    <div class="col-6">
                      <button class="btn-google open-social-login">Google</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form action="#" class="register-form">
              <div class="row">
                <div class="col-12">
                  <div class="row">
                    <div class="col-4 col-md-3">
                      <div class="form-group">
                        <div class="radio">
                          <input id="radio-1" name="radio" type="radio" checked>
                          <label for="radio-1" class="radio-label">Anh</label>
                        </div>
                      </div>
                    </div>
                    <div class="col-4 col-md-3">
                      <div class="form-group">
                        <div class="radio">
                          <input id="radio-2" name="radio" type="radio">
                          <label for="radio-2" class="radio-label">Chị</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Họ và tên">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Điện thoại">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Địa chỉ email">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-12">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Mật khẩu">
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn-submit" type="submit">Tạo tài khoản</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade login-form" id="socialLoginModal" tabindex="-1" role="dialog" aria-labelledby="socialLoginModalLabel"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-form-nav">
          <h3 class="popup-title">Xác nhận thông tin tài khoản</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="tab-content">
          <form action="#" class="register-form">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="form-group">
                      <div class="radio">
                        <input id="radio-1" name="radio" type="radio" checked>
                        <label for="radio-1" class="radio-label">Anh</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-4 col-md-3">
                    <div class="form-group">
                      <div class="radio">
                        <input id="radio-2" name="radio" type="radio">
                        <label for="radio-2" class="radio-label">Chị</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Họ và tên">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Điện thoại">
                </div>
              </div>
              <div class="col-12">
                <button class="btn-submit" type="submit">Tạo tài khoản</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!--//=include includes/_hotline.html-->

<div class="hotline-wrapper">
  <div class="social-action">
    <a id="BackToTop" href="#"><img src="/assets/img/svg/hotline-up.svg"></img></a>
  </div>
</div>

<!--FOOTER-->
<footer id="Footer">
  <div class="container">
    <div class="footer-wrapper">
      <div class="d-block d-lg-none footer-top border-bottom-footer">
        <div class="row">
          <div class="col-12">
            <div class="footer-block">
              <h3 class="footer-block-title">CÁCH THỨC MUA HÀNG</h3>
              <ul class="footer-block-list">
                <li>Tổng đài hỗ trợ <a href="tel:0989-123-456" class="main-color">0837 000 247</a></li>
                <li><a href="#">Hướng dẫn mua hàng</a></li>
                <li><a href="#">Hưỡng dẫn thanh toán</a></li>
                <li><a href="#">Phương thức vận chuyển</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="d-block d-lg-none footer-top border-bottom-footer">
        <div class="row">
          <div class="col-12">
            <div class="footer-block footer-toggle">
              <a class="footer-block-title" data-toggle="collapse" href="#collapseExample" role="link" aria-expanded="false" aria-controls="collapseExample">
                Các thông tin khác
              </a>
              <div class="collapse" id="collapseExample">
                <ul class="footer-block-list">
					<li><a href="{{url('/chinh-sach-doi-tra')}}">Chính sách đổi trả</a></li>
                  <li><a href="{{url('/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a></li>
                  <li><a href="{{url('/bao-mat-thong-tin')}}">Bảo mật thông tin</a></li>
                  <li><a href="{{url('/thong-tin-lien-he')}}">Thông tin liên hệ</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="d-block d-lg-none footer-top border-bottom-footer">
	    <div class="row">
	      <div class="col-12">
	        <div class="footer-block">

			  <ul class="footer-block-social">
				<li><h3 class="footer-block-title">Kết nối</h3></li>
			    <li><a href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
			    <li><a href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
			    <li><a href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
			  </ul>
	        </div>
	      </div>
	    </div>
	  </div>
      <div class="footer-top d-none d-lg-block">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-4">
                <div class="footer-block">
                  <h3 class="footer-block-title">CHÍNH SÁCH</h3>
                  <ul class="footer-block-list">
                    <li><a href="{{url('/chinh-sach-doi-tra')}}">Chính sách đổi trả</a></li>
                    <li><a href="{{url('/chinh-sach-bao-hanh')}}">Chính sách bảo hành</a></li>
                    <li><a href="{{url('/bao-mat-thong-tin')}}">Bảo mật thông tin</a></li>
                    <li><a href="{{url('/thong-tin-lien-he')}}">Thông tin liên hệ</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="footer-block">
                  <h3 class="footer-block-title">HƯỚNG DẪN KHÁCH HÀNG</h3>
                  <ul class="footer-block-list">
                    <li><a href="{{url('/huong-dan-mua-hang')}}">Hướng dẫn mua hàng</a></li>
                    <li><a href="{{url('/huong-dan-thanh-toan')}}">Hướng dẫn thanh toán</a></li>
                    <li><a href="{{url('/phuong-thuc-van-chuyen')}}">Phương thức vận chuyển</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="footer-block d-none d-md-block">
                  <h3 class="footer-block-title">HỖ TRỢ</h3>
                  <ul class="footer-block-list">
                    <li><a href="mailto:{{$settings->find('email')->value}}" target="_top">{{$settings->find('email')->value}}</a></li>
                  </ul>
                </div>
                <div class="footer-block mt-4">
                  <h3 class="footer-block-title">KẾT NỐI</h3>
                  <ul class="footer-block-social">
                    <li><a href="{{$settings->find('facebook')->value}}"><i class="icon icon-facebook-square"></i></a></li>
                    <li><a href="{{$settings->find('youtube')->value}}"><i class="icon icon-youtube"></i></a></li>
                    <li><a href="{{$settings->find('instagram')->value}}"><i class="icon icon-instagram"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <div class="footer-contact">
                  <div class="footer-contact-top">
                    <div class="row align-items-center">
                      <div class="col-5">
                        <div class="text-center">
                          <img src="/assets/img/icon/contact.png" class="img-fluid" alt="">
                        </div>
                      </div>
                      <div class="col-7">
                        <div class="footer-contact-detail">
                          <h3 class="footer-contact-detail-title">
                            Tổng đài hỗ trợ
                          </h3>
                          <p>(8h00 - 22h00)</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="footer-contact-phone">
                    <a href="tel:{{$settings->find('phone')->value}}" class="text-center">{{$settings->find('phone')->value}}</a>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="footer-subscriber">
                  <div class="footer-subscriber-detail">
                    <h3 class="footer-subscriber-detail-title">
                      Đăng ký <br> nhận bản tin
                    </h3>
                    <p class="footer-subscriber-detail-content">Đừng bỏ lỡ các thông tin sản phẩm
                      và chương trình siêu hấp dẫn</p>
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Email của bạn"
                             aria-label="Email của bạn">
                      <div class="input-group-prepend">
                        <a class="btn-subscriber">Đăng ký</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="row">
          <div class="col-md-10 order-1 order-md-0">
            <div class="footer-bottom-detail">
              <h3 class="footer-bottom-detail-title">Công ty TNHH Dịch Vụ UM - </h3>
              <p class="footer-bottom-detail-content">OneStopShop IT - Lựa chọn hàng đầu về giải pháp và thiết bị trong
                lĩnh vực công nghệ thông tin</p>
              <p class="footer-bottom-detail-content">Số giấy chứng nhận ĐKDN: ???. Đăng ký lần đầu: ???. Cơ quan
                cấp:???, Sở kế hoạch và đầu tư thành phố Hồ Chí Minh.</p>
            </div>
          </div>
          <div class="col-md-2 order-0 order-md-1">
            <div class="image-check">
              <img src="/assets/img/icon/checked.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--END FOOTER-->
<script src="/assets/js/main.js"></script>
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
$(function(){
var count = 8;
$('.view-more-btn').on('click',function(){
console.log('before-ajax');
$.ajax({
type: 'POST',
url:"{{route('front.view-more')}}",
data: {'_token':'{{csrf_token()}}', 'count': count},
success: function(data){
  console.log(data);
$('#news-list .news-list-wrapper').append(data.html);
count += 4;
if (count > data.total){
  $('.view-more-btn').remove();
}
},
});
});
});
</script>
</body>
</html>

