<section id="news-technology-list" class="position-relative">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="page-title">Tin tức & Công nghệ</h2>
  
          <a href="{{route('front.post-list')}}" class="view-all">Xem tất cả</a>
        </div>
      </div>
  	<div class="news-wrapper owl-carousel owl-theme">
  		@foreach ($posts as $post)
  		<div class="item">
  		  <div class="news-item">
  		    <a href="{{route('front.post-detail',$post->slug)}}">
  		      <div class="news-image">
  		        <div style="background-image: url('{{$post->thumb}}')"></div>
  		      </div>
  		      <div class="news-text">
  		        <h3 class="news-title">{{ $post->title }}</h3>
  		        <h4 class="news-datetime">{{date('d/m/Y H:i',strtotime($post->created_at))}}</h4>
  		      </div>
  		    </a>
  		  </div>
  		</div>
  		@endforeach
  	</div>
    </div>
  </section>