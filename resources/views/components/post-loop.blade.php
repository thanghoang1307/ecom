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
                      <h4 class="news-datetime">{{date('d/m/Y H:i',strtotime($post->created_at))}}</h4>
                      <p class="news-desc">
                        {!! strip_tags($post->content) !!}
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        @endforeach