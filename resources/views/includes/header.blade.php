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
											<li value="{{$cat->slug}}" class="dropdown-item">{{$cat->short_name}}</li>
											@endforeach
										</ul>
									</div>
								</div>
								<div class="col-10 col-lg-7">
									<div class="header-brand-search-input">
										<input type="text" name="search" class="form-control" aria-label="Tìm kiếm sản phẩm" placeholder="Tìm kiếm sản phẩm">
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
						<a class="user-cart d-none d-md-inline-block" href="#"><span>Đăng nhập/Đăng ký <i
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
										<h3 class="product-head-title"><a href="{{route('front.product-detail',$prd->slug)}}">{{$prd->name}}</a></h3>
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