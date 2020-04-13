@extends('layouts.app')
@section('title')
Chỉnh sửa danh mục {{$cat->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.cat.update',$cat->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{$cat->name}}">
              </div> 
			  <div class="form-group">
              <input type="text" class="form-control" name="slug" value="{{$cat->slug}}">
              </div> 
               <div class="form-group">
                 <label for="parent_id">Danh muc cha</label>
              <select name="parent_id" class="form-control">
                <option value="">Không thuộc danh mục nào</option>
                @foreach( $cats as $item)
                <option value="{{$item->id}}" <?php 
                echo $cat->parent_id == $item->id ? "selected" : ""
                ?>>{{$item->name}}</option>
                @endforeach
              </select>
              </div> 
              <div class="form-group">
              <input type="text" class="form-control" name="meta_title" value="{{$cat->meta_title}}" placeholder="Meta Title">
              </div> 
              <div class="form-group">
              <input type="textarea" class="form-control" name="meta_desc" value="{{$cat->meta_desc}}" placeholder="Meta Description">
              </div>
              <div class="form-group">
              <input type="text" class="form-control" name="meta_keys" value="{{$cat->meta_keys}}" placeholder="Meta Keywords">
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
@section('modal')

@endsection
