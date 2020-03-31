@extends('layouts.front')
@section('content')
<main id="one-stop-news-list" class="main news-page">
  <div class="container">
    <section id="news-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('front.post-list')}}">Tin tức & Công nghệ</a></li>
          </ol>
        </nav>
      </div>
    </section>

    <div class="row">
      <div class="col-xs-12 col-sm-7">
        <section id="news-list">
          <h2 class="page-title">Tin tức & Công nghệ</h2>
        
          <div class="news-list-wrapper">
          	@foreach ($posts as $post)
            <div class="news-item">
              <a href="{{route('front.post-detail',$post->slug)}}">
                <div class="row no-gutters">
                  <div class="col-5">
                    <div class="news-image">
                      <div style="background-image: url('{{$post->thumb}}')"></div>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="news-text">
                      <h3 class="news-title">{{ Str::limit($post->title, $limit = 150, $end = '..') }}</h3>
                      <h4 class="news-datetime">Đăng ngày {{date('d/m/Y H:i',strtotime($post->created_at))}}</h4>
                      <p class="news-desc">
                        {!! strip_tags($post->content) !!}
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        @endforeach
          </div>
        
          <div class="view-more">
            <button class="btn btn-action view-more-btn">Xem thêm</button>
          </div>
        </section>
      </div>
      <div class="col-xs-12 col-sm-5">
        <section id="video-list">
          <h2 class="page-title">Video</h2>
        
          <div class="video-box">
            <div class="video-list-wrapper">
            	@foreach ($videos as $video)
              <div class="video-item">
                <a href="{{route('front.post-detail',$video->slug)}}">
                  <div class="row">
                    <div class="col-6">
                      <div class="video-image">
                        <div style="background-image: url('{{$video->thumb}}')"></div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="video-text">
                        <h3 class="video-title">{!! strip_tags($video->title) !!}</h3>
                        <h4 class="video-view">{{$video->view}} lượt xem</h4>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </section>

        <section id="most-viewed-articles-list">
          <h2 class="page-title">Xem nhiều nhất</h2>
        
          <div class="news-box">
            <div class="news-list-wrapper">
            	@foreach ($most_vieweds as $most_viewed)
              <div class="news-item">
                <a href="{{route('front.post-detail',$most_viewed->slug)}}">
                  <div class="row">
                    <div class="col-4">
                      <div class="news-image">
                        <div style="background-image: url('{{$most_viewed->thumb}}')"></div>
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="news-text">
                        <h3 class="news-title">{{ Str::limit(strip_tags($most_viewed->title), $limit = 150, $end = '...') }}</h3>
                        <h4 class="news-datetime">Đăng ngày {{date('d/m/Y H:i',strtotime($most_viewed->created_at))}}</h4>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
        @endforeach
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>
@endsection
@section('script')
<script>
$(function(){
var count = 6;
$('.view-more-btn').on('click',function(){
$.ajax({
type: 'POST',
url:"{{route('front.view-more')}}",
data: {'_token':'{{csrf_token()}}', 'count': count},
success: function(data){
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
@endsection
