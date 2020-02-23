@foreach ($posts as $post)
            <div class="news-item">
              <a href="news-detail.html">
                <div class="row no-gutters">
                  <div class="col-5">
                    <div class="news-image">
                      <div style="background-image: url('{{$post->thumb}}')"></div>
                    </div>
                  </div>
                  <div class="col-7">
                    <div class="news-text">
                      <h3 class="news-title">{{ Str::limit($post->content, $limit = 150, $end = '..') }}</h3>
                      <h4 class="news-datetime">Đăng ngày {{date('d/m/Y H:i',strtotime($post->created_at))}}</h4>
                      <p class="news-desc">
                        {!!Str::limit($post->content, $limit = 300, $end = '..') !!}
                      </p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
        @endforeach