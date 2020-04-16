@extends('layouts.app')
@section('title')
<i class="fas fa-images"></i>  Danh sách vị trí banner
@endsection
@section('content')
<div class="row">
          <div class="col-lg-12">
            <div class="card">
            @if($position_id == 1)
              <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i>
                </button>               
              </div>
              @endif
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
                      @if($position_id == 1)
                      <a href="{{route('admin.banner.delete',$banner->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                      @endif
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              @if($position_id == 1)
              <div class="card-footer clearfix">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
              @endif
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
            <form action="{{route('admin.banner.create')}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Thêm banner</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
              <label>Tên banner</label>
              <input type="text" name="name">
              </div>
            <input type="hidden" name="position_id" value="{{$position_id}}">
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