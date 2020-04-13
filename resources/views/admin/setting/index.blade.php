@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-cogs"></i>  Cài đặt
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.setting.update')}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @foreach ($settings as $setting)
              @if ($setting->key == 'logo')
              <div class="form-group">
              <label>Logo</label>
              <div class="input-group">
          <div class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
          <i class="fa fa-picture-o"></i> Choose
          </a>
          </div>
          <input id="thumbnail" class="form-control" type="text" name="logo" value="{{$setting->value}}">
          </div>
          <div id="holder" style="margin-top:15px;max-height:100px; background-color: #962d91;">
            <img src="{{$setting->value}}" style="height:5rem;"/>
            </div>
          </div>
              @else
              <div class="form-group">
                <label>{{$setting->name}}</label>
              <input type="text" class="form-control" name="{{$setting->key}}" value="{{$setting->value}}">
              </div> 
              @endif
              @endforeach
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
  <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
</script>
@endsection