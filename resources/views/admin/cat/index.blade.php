@extends('layouts.app')
@section('title')
<i class="far fas fa-layer-group nav-icon"></i>  Danh sách danh mục sản phẩm
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i>
                </button>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên danh mục</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cats as $cat)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$cat->name}}</td>
                      <td>
					  	<a href="{{route('admin.cat.edit',$cat->id)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                      <!--<a href="{{route('admin.cat.delete',$cat->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>-->
					  </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{$cats->render()}}
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
@section('modal')
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{action('Admin\Prd\CatController@create')}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Tạo danh mục mới</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
				<label>Tên danh mục</label>
                <input class="form-control" type="text" name="name" placeholder="Tên danh mục">
              </div>
			  <div class="form-group">
				<label>Slug</label>
                <input class="form-control" type="text" name="slug" placeholder="Slug">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Tạo">
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
