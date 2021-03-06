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
	<link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/toastr/toastr.css')}}">
	<script src="https://getbootstrap.com/docs/4.1//assets/js/vendor/popper.min.js"></script>
</head>
<body>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-579KXRM');</script>
<!-- End Google Tag Manager -->

	<!--HEADER-->
	<header id="Header" class="header-wrapper">
		<div class="header-top-banner d-none d-md-block">
			<div class="container">
				<a href="{{$top_banner->link}}"><img src="{{$top_banner->image}}" class="img-fluid" alt=""></a> </div>
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
								@auth('customer')
								<a class="nav-link user-action" href="{{route('front.account.index')}}">{{Auth::guard('customer')->user()->name}} <i
									class="icon icon-user-head"></i></a>
								@endauth
								@guest('customer')
									<a class="nav-link user-action" data-toggle="modal" data-target="#loginModal">Đăng nhập/ Đăng ký <i
										class="icon icon-user-profile"></i></a>
								@endguest
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
									@auth('customer')
									<a href="{{route('front.account.index')}}" class="user-action-toggle">
										<i class="icon icon-user-profile"></i>
									</a>
									@endauth
									@guest('customer')
									<a data-toggle="modal" data-target="#loginModal" class="user-action-toggle">
										<i class="icon icon-user-profile"></i>
									</a>
									@endguest
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
								<form action="{{route('front.search')}}" class="header-brand-search" method="POST">
									@csrf
									<div class="row no-gutters align-items-center">
										<div class="col-lg-4 d-none d-lg-flex d-lg-block">
											<div class="header-brand-search-filter">
												<select class="header-brand-search-filter-btn dropdown-toggle" name="cat">
													<option value="0">Danh mục</option>
													@foreach ($cats as $cat)
													<option value="{{$cat->slug}}">{{$cat->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-10 col-lg-7">
											<div class="header-brand-search-input">
												<input type="text" class="form-control" aria-label="Tìm kiếm sản phẩm" placeholder="Tìm kiếm sản phẩm" name="search" value="{{app('request')->input('search')}}">
											</div>
										</div>
										<div class="col-2 col-lg-1">
											<button type="submit" class="header-brand-search-action bg-transparent border-0"><i class="icon icon-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-1 col-md-3">
							<div class="text-right">
								<!--USER ACTION-->
								@auth('customer')
								<a class="user-cart d-none d-md-inline-block" href="{{route('front.account.index')}}"><span>{{Auth::guard('customer')->user()->name}} <i
									class="icon icon-user-head"></i></span></a>
								@endauth
								@guest('customer')
									<a class="user-cart d-none d-md-inline-block" data-toggle="modal" data-target="#loginModal"><span>Đăng nhập/Đăng ký <i
									class="icon icon-user-head"></i></span></a>
								@endguest
								
									<!--USER LOGIN-->
									<span class="cart-title d-none d-md-inline-block">Giỏ hàng</span>
									<div class="dropdown dropdown-discount">
										<a class="highlight d-block d-md-none" href="{{route('front.check_out_1')}}">
											<span class="header-cart-number">{{session()->get('cart.items') ? array_sum(session()->get('cart.items')) : 0}}</span>
											<i class="icon icon-shopping-cart"></i>
										</a>
										<a class="highlight d-none d-md-block" href="{{route('front.check_out_1')}}" id="dropdownMenuButton" data-toggle="dropdown"
										aria-haspopup="true"
										aria-expanded="false">
										<span class="header-cart-number">{{session()->get('cart.items') ? array_sum(session()->get('cart.items')) : 0}}</span>
										<i class="icon icon-shopping-cart"></i>
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										@if(count($prds_in_cart))
										@foreach ($prds_in_cart as $prd)
										<li class="dropdown-item">
											<div class="product-head">
												<a href="{{route('front.product-detail',$prd->slug)}}" class="card-image">
													<img src="{{$prd->thumb}}" class="img-fluid">
												</a>
												<h3 class="product-head-title"><a href="{{route('front.product-detail',$prd->slug)}}">{{$prd->name}}</a></h3>
											<span class="product-price price">{{ $prd->current_price}}<sup>đ</sup><strong class="count"> x{{$carts[$prd->id]}}</strong></span>
											</div>
										</li>
										@endforeach
										<li class="dropdown-item">
											<div class="product-end">
												<h5 class="product-end-block"><span class="product-end-title">Thành tiền</span> <span
													class="product-end-block-price price">{{$cart_total}}<sup>đ</sup></span></h5>
													<a href="{{route('front.check_out_1')}}" class="view-all-product">Xem giỏ hàng</a>
												</div>
											</li>
											@else
<li class="dropdown-item px-5 py-5"><em>Chưa có sản phẩm trong giỏ hàng</em></li>
											@endif
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
				<div class="hidden-bg menu-toggle" class="" data-toggle="collapse" href="#collapseMenu" role="button" aria-expanded="true"
             aria-controls="collapseMenu" style="background-color: rgba(0,0,0,0.75); width: 15vw; height: 100%; position: absolute; left: 85vw; top: 0; z-index: 19;">&nbsp;</div>
				<div class="hidden-panel-content">
					<a href="{{route('front.product-list')}}" class="product-navigation-action">
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