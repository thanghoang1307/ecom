@extends('layouts.app')
@section('title')
Chỉnh sửa bài viết {{$post->name}}
@endsection
@section('content')  
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.post.update',$post->slug)}}">
                @csrf 
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <!-- /.form group -->
              <div class="form-group">
                <label>Tiêu đề bài viết</label>
              <input type="text" class="form-control" name="title" value="{{$post->title}}">
              </div>
              <div class="form-group">
                <label>Slug</label>
              <input type="text" class="form-control" name="slug" value="{{$post->slug}}">
              </div>
              <div class="form-group">
                <label>Noi dung</label>
              <textarea id="my-editor" class="form-control" name="content" rows="5">{{$post->content}}</textarea>
              </div>
              <div class="form-group">
              <label>Chọn hình đại diện</label>
              <div class="input-group">
                
          <div class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
          <i class="fa fa-picture-o"></i> Choose
          </a>
          </div>
          <input id="thumbnail" class="form-control" type="text" name="thumb" value="{{$post->thumb}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;">
            <img src="{{$post->thumb}}" style="height:5rem;"/>
            </div>
          </div>
              <div class="form-group">
                <label>Loai post</label>
              <select class="form-control" name="post_type">
               <option value="post" {{$post->post_type == 'post' ? 'selected' : ''}}>Bai viet</option>
               <option value="page" {{$post->post_type == 'page' ? 'selected' : ''}}>Trang</option>
               <option value="video" {{$post->post_type == 'video' ? 'selected' : ''}}>Video</option>
              </select>
              </div>
              </div>              
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              </form>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection

@section('script')
<script>
   var route_prefix = "/filemanager";
  </script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "",
      selector: "textarea[name=content]",
      plugins: [
        "link image code media"
      ],
      relative_urls: false,
      height: 129,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
    tinymce.init(editor_config);
  </script>
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
  $('#lfm2').filemanager('image');
</script>
@endsection
