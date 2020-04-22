<section class="home-partner-list d-none d-md-block">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="home-partner-list-wrapper">
          	@foreach ($brands as $brand)
            <div class="item">
              <a href="{{route('front.brand-list',$brand->slug)}}">
                <img src="{{$brand->logo}}" class="img-fluid d-none" alt="">
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
</section>