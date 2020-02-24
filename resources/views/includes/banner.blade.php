<section class="product-navigation">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-3 bg-white">
        <div class="product-navigation-wrapper">
          <a href="#" class="product-navigation-action">
            <i class="icon icon-align-justify"></i>Danh mục sản phẩm
          </a>
          <ul class="product-navigation-list">
          	@foreach ( $cats as $cat )
            <li>
              <a href="{{route('front.category-list',$cat->slug)}}">
                <i class="icon icon-{{$cat->icon}}"></i>{{$cat->name}}
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-md-9 bg-white">
        <!-- only dekstop -->
        <div class="d-none d-lg-block">
          <div class="big-banner">
        @if ($main_banner_1)    
            <div class="item">
				<a href="{{$main_banner_1->link}}"><img src="{{$main_banner_1->image}}" class="img-fluid" alt=""></a>
            </div>
        @endif
        @if ($main_banner_2)    
            <div class="item">
        <a href="{{$main_banner_2->link}}"><img src="{{$main_banner_2->image}}" class="img-fluid" alt=""></a>
            </div>
        @endif
        @if ($main_banner_3)    
            <div class="item">
        <a href="{{$main_banner_3->link}}"><img src="{{$main_banner_3->image}}" class="img-fluid" alt=""></a>
            </div>
        @endif
        @if ($main_banner_4)    
            <div class="item">
        <a href="{{$main_banner_4->link}}"><img src="{{$main_banner_4->image}}" class="img-fluid" alt=""></a>
            </div>
        @endif
          </div>
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class="small-banner">
			  	<a href="{{$sub_banner_1->link}}"><img src="{{$sub_banner_1->image}}" class="img-fluid" alt=""></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-banner">
          <a href="{{$sub_banner_2->link}}"><img src="{{$sub_banner_2->image}}" class="img-fluid" alt=""></a>
              </div>
            </div>
            <div class="col-md-4">
              <div class="small-banner">
          <a href="{{$sub_banner_3->link}}"><img src="{{$sub_banner_3->image}}" class="img-fluid" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-block d-lg-none">
    <div class="big-banner">
      @if ($main_banner_1)
      <div class="item">
        <a href="{{$main_banner_1->link}}"><img src="{{$main_banner_1->image}}" class="img-fluid" alt=""></a>
      </div>
      @endif
      @if ($main_banner_2)
      <div class="item">
        <a href="{{$main_banner_2->link}}"><img src="{{$main_banner_2->image}}" class="img-fluid" alt=""></a>
      </div>
      @endif
      @if ($main_banner_3)
      <div class="item">
        <a href="{{$main_banner_3->link}}"><img src="{{$main_banner_3->image}}" class="img-fluid" alt=""></a>
      </div>
      @endif
      @if ($main_banner_4)
      <div class="item">
        <a href="{{$main_banner_4->link}}"><img src="{{$main_banner_4->image}}" class="img-fluid" alt=""></a>
      </div>
      @endif
    </div>
    <!-- only mobile 4 product-navigation-wrapper -->
    <div class="product-navigation-wrapper-mobile">
      <div class="container">
        <div class="row">
          @foreach ($cats as $cat)
          <div class="col-3">
            <a class="product-navigation-block" href="{{route('front.category-list',$cat->slug)}}">
              <p>{{$cat->short_name}}</p>
            </a>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>