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
  $(function() {
    // Desktop Order
    $('#product-order').on('click', 'input[name="d_orderby"]', redirectParam);

    // Desktop Filter
    $('#product-category').on('change', ['input[name="brand_checkbox"]', 'input[name="price_checkbox"]'], redirectParam);

    // Mobile Order & Filter
    $('button.apply-filter').on('click', function(e) {
      e.preventDefault();
      mobileRedirectParam();
    });

    $('button.clear-filter').on('click', function(e) {
      e.preventDefault();
      clearOrderAndFilter();
    });

  });
</script>
<script>
  function clearOrderAndFilter() {
    const url = 'http://' + window.location.hostname + ':' + window.location.port + window.location.pathname;
    window.location.href = url;
  }

  function redirectParam() {
    var brand_arr = [];
    $.each($("input[name='brand_checkbox']:checked"), function() {
      brand_arr.push($(this).val());
    });
    var price_arr = [];
    $.each($("input[name='price_checkbox']:checked"), function() {
      price_arr.push($(this).val());
    });

    var search = '{{app("request")->input("search")}}';

    var param_arr = [];
    param_arr.push('orderby=' + $('input[name="d_orderby"][checked="checked"]').val());
    if (brand_arr.length) {
      param_arr.push('brand=' + brand_arr.join('_'));
    }

    if (price_arr.length) {
      param_arr.push('price=' + price_arr.join('_'));
    }

    if (search) {
      param_arr.push('search=' + search);
    }

    param = '?' + param_arr.join('&');
    const url = 'https://' + window.location.hostname + ':' + window.location.port + window.location.pathname;
    window.location.href = url + param;
  };

  function mobileRedirectParam() {
    var brand_arr = [];
    $.each($("input[name='mb_checkbox']:checked"), function() {
      brand_arr.push($(this).val());
    });

    var price_arr = [];
    $.each($("input[name='mp_checkbox']:checked"), function() {
      price_arr.push($(this).val());
    });

    var search = '{{app("request")->input("search")}}';

    var param_arr = [];
    param_arr.push('orderby=' + $('input[name="m_orderby"]:checked').val());
    if (brand_arr.length) {
      param_arr.push('brand=' + brand_arr.join('_'));
    }

    if (price_arr.length) {
      param_arr.push('price=' + price_arr.join('_'));
    }

    if (search) {
      param_arr.push('search=' + search);
    }
    param = '?' + param_arr.join('&');
    const url = 'http://' + window.location.hostname + ':' + window.location.port + window.location.pathname;
    window.location.href = url + param;
  };
</script>
@endsection