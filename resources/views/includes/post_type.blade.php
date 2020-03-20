   <section id="news-title">
      <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('front.index')}}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tin tức & Công nghệ</li>
          </ol>
        </nav>
      </div>
    </section>
<div class="row">
      <div class="col-xs-12 col-sm-7">
        <section id="news-article">
          <div class="article-header">
            <h1 class="article-title">{{$post->title}}</h1>
          </div>
          <div class="article-body">
            {!!$post->content!!}
          </div>
        </section>
      </div>
      <div class="col-xs-12 col-sm-5">
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
                        <h3 class="news-title">{{ Str::limit(strip_tags($most_viewed->content), $limit = 150, $end = '..') }}</h3>
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
                        <h3 class="video-title">{{ Str::limit(strip_tags($post->content), $limit = 60, $end = '..') }}</h3>
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
      </div>
    </div>

    <div class="page-gap"></div>
@render(\App\ViewComponents\RecentlyViewProductComponent::class)    