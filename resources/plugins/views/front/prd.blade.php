@extends('layouts.front')
@section('content')
<main id="one-stop-product-detail" class="main product-page">
  <div class="container">
    <div class="product-intro">
      <div class="row no-gutters">
        <div class="col-xs-12 col-sm-12 col-lg-7">
          <section id="product-slider">
            <div class="slider slider-single">
              <div>
                <figure class="product-image">
                  <img src="{{$prd->thumb}}">
                </figure>
              </div>
              @foreach ($prd->images as $image)
              <div>
                <figure class="product-image">
                  <img src="{{$image->image}}">
                </figure>
              </div>
              @endforeach
            </div>
            <div class="slider slider-nav d-none d-sm-block">
              <div>
                <div class="product-thumbnail">
                  <div style="background-image: url('{{$prd->thumb}}')"></div>
                </div>
              </div>
              @foreach ($prd->images as $image)
              <div>
                <div class="product-thumbnail">
                  <div style="background-image: url('{{$image->image}}')"></div>
                </div>
              </div>
              @endforeach
            </div>
          </section>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-5">
          <section id="product-info">
            <div class="product-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
          		<li class="breadcrumb-item active" aria-current="page"><a href="{{route('front.category-list', $prd->first_cat()->slug)}}">{{$prd->first_cat()->name}}</a></li>
                </ol>
              </nav>
            </div>
            <div class="product-cart">
              
              <h2 class="product-name">{{$prd->name}}</h2>
              <h3 class="product-code">Mã sản phẩm: <span>{{$prd->sku}}</span></h3>
              <h4 class="product-price price">{{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}<sup>đ</sup></h4>
              @if ($prd->sale_price)
              <div class="product-discount">
                <h5 class="percentage-discount">-{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}}%</h5>
                <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
              </div>
              @endif
              <div class="product-action">
                <div>
                  <form action="{{route('front.buy_now',$prd->id)}}" method="POST">
                @csrf
                  <button class="btn btn-action">Mua ngay</button>
                  </form>
                </div>
                <div>
                  <form action="{{route('front.add_to_cart',$prd->id)}}" method="POST">
                @csrf
                  <button type="submit" class="btn btn-outline-action">Thêm vào giỏ hàng</button>
                  </form>
                </div>
              </div>
            
            </div>
            <div class="product-promotion">
              <h4 class="promotion-title"><i></i><span>Ưu đãi</span></h4>
              <div class="promotion-content">
                {{$prd->short_desc}}
              </div>
            </div>
            <div class="product-link">
              <a href="#product-feature">
                <span>Xem tính năng / Thông số kĩ thuật</span> <i class="icon icon-caret-down"></i>
              </a>
            </div>
          </section>
        </div>
      </div>
    </div>

    <div class="section-gap"></div>

    <section class="product-page-wrapper">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-7">
          <section id="product-feature">
            <div class="feature-header">
              <h4 class="feature-label">Thông số kỹ thuật / Tính năng</h4>
            </div>
            <div class="feature-body">
              <ul class="specification-list">
                @foreach ($prd->attrs as $attr)
                @if ($attr->is_looped)
                <li>
                  <label>{{$attr->name}}</label>
                @switch($attr->type)
                  @case('integer')
                  <span>{{$attr->pivot->integer_val}}</span>
                  @break
                  @case('datetime')
                  <span>{{$attr->pivot->datetime_val}}</span>
                  @break
                  @case('date')
                  <span>{{$attr->pivot->date_val}}</span>
                  @break
                  @case('boolean')
                  <span>{{$attr->pivot->boolean_val ? "Có" : "Không"}}</span>
                  @break
                  @case('float')
                  <span>{{$attr->pivot->float_val}}</span>
                  @break
                  @default
                  <span>{{$attr->pivot->text_val}}</span>
                @endswitch()
                </li>
                @endif
                @endforeach
              </ul>
              <div class="feature-text">
                {{$prd->long_desc}}
              </div>
            </div>
          </section>
        </div>
        <div class="col-xs-12 col-sm-12 col-lg-5">
          <div class="product-cart-selected">
            <section id="product-cart">
              <div class="cart-header">
                <h2 class="product-name">{{$prd->name}}</h2>
                <h3 class="product-code">Mã sản phẩm: <span>{{$prd->sku}}</span></h3>
              </div>
              <div class="cart-body">
                <h4 class="product-price price">{{$prd->sale_price ? $prd->sale_price : $prd->regular_price}}<sup>đ</sup></h4>
                @if ($prd->sale_price)
                <div class="product-discount">
                  <h5 class="percentage-discount">-{{number_format(($prd->regular_price - $prd->sale_price)*100/$prd->regular_price, 2)}}%</h5>
                  <h6 class="original-price price">{{$prd->regular_price}}<sup>đ</sup></h6>
                </div>
                @endif
                <div class="product-action">
                  <div>
                   <form action="{{route('front.buy_now',$prd->id)}}" method="POST">
                @csrf
                  <button class="btn btn-action">Mua ngay</button>
                  </form>
                  </div>
                  <div>
                    <form action="{{route('front.add_to_cart',$prd->id)}}" method="POST">
                @csrf
                  <button type="submit" class="btn btn-outline-action">Thêm vào giỏ hàng</button>
                  </form>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="page-gap"></div>

  @render(\App\ViewComponents\RecentlyViewProductComponent::class)

  @post
  

  <div class="page-gap"></div>
</main>

<div class="hotline-wrapper">
  <div class="social-action">
    <a id="BackToTop" href="#"><img src="/assets/img/svg/hotline-up.svg"></img></a>
  </div>
</div>
@endsection