@extends('layouts.app')
@section('title')
Chỉnh sửa {{$banner->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.banner.update',$banner->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{$banner->name}}">
              </div> 
              <div class="form-group">
              <input type="text" class="form-control" name="link" value="{{$banner->link}}">
              </div> 
              <div class="input-group">
          <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
          <i class="fa fa-picture-o"></i> Choose
          </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="image" value="{{$banner->image}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px;">
            <img src="{{$banner->image}}" style="height:5rem;"/>
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
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
</script>
@endsection
