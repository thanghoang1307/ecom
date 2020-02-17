@extends('layouts.app')
@section('title')
Chỉnh sửa thương hiệu {{$brand->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.brand.update',$brand->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
              <input type="text" class="form-control" name="slug" value="{{$brand->slug}}">
              </div> 
              <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{$brand->name}}">
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
@section('modal')

@endsection
