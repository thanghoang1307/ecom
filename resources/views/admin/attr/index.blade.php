@extends('layouts.app')
@section('title')
Danh sách thuộc tính
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
                      <th>Tên thuộc tính</th>
                      <th>Mã thuộc tính</th>
                      <th>Loại thuộc tính</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($attrs as $attr)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$attr->name}}</td>
                      <td>{{$attr->code}}</td>
                      <td>{{$attr->type}}</td>
                      <td><a href="{{route('admin.attr.edit',$attr->id)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
                      
                      <a href="{{route('admin.attr.delete',$attr->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{$attrs->render()}}
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
            <form action="{{action('Admin\Prd\AttrController@create')}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Tạo thuộc tính mới</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Tên thuộc tính">
              </div> 
              <div class="form-group">
                <input class="form-control" type="text" name="code" placeholder="Mã thuộc tính">
              </div>
              <div class="form-group">
                <select class="form-control" name="type" placeholder="Loại thuộc tính">
                  
                	<option value="text" >Chữ</option>
                	<option value="boolean">Có/Không</option>
                	<option value="datetime">Thời gian</option>
                	<option value="date">Ngày tháng năm</option>
                	<option value="int">Số nguyên</option>
                	<option value="float">Thập phân</option>
                </select>
              </div>
              <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="is_required">
          Bắt buộc
        </label>
              </div><div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="is_looped">
          Hiển trị trong nội dung
        </label>
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
