@extends('layouts.app')
@section('title')
<i class="fas fa-images"></i>  Danh sách banner
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên banner</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banners as $banner)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$banner->name}}</td>
                      <td><a href="{{route('admin.banner.edit',$banner->id)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                      <a href="{{route('admin.banner.delete',$banner->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
