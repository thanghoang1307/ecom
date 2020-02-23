@extends('layouts.app')

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
                      <th>Tên bài viết</th>
                      <th>Loại bài viết</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$post->title}}</td>
                      <td>
                        {{$post->post_type}}
                      </td>
                      <td><a href="{{route('admin.post.edit',$post->slug)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                      
                      <a href="{{route('admin.post.delete',$post->slug)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{$posts->render()}}
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
            <form action="{{route('admin.post.create')}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Tạo bài viết mới</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="Tiêu đề">
              </div>
                <div class="form-group">
              <label>Loại bài viết</label>
                <select class="form-control" name="post_type">
                  <option value="post">Bài viết</option>
                  <option value="page">Trang</option>
                  <option value="video">Video</option>
                </select>
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