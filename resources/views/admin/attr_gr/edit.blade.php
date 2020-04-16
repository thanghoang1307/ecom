@extends('layouts.app')
@section('title')
<i class="far fas fa-object-group nav-icon"></i>  Chỉnh sửa nhóm thuộc tính {{$attr_gr->name}}
@endsection
@section('content')       
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.attr_gr.update',$attr_gr->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
                <label>Tên nhóm thuộc tính</label>
              <input type="text" class="form-control" name="name" value="{{$attr_gr->name}}">
              </div>
              <label>Danh sách thuộc tính</label>
               <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Tên thuộc tính</th>
                      <th>Hành động</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($attrs_in as $attr)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$attr->name}}</td>
                      <td><a href="{{route('admin.attr_gr.delete_attr',[$attr->id,$attr_gr->id])}}"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  Thêm thuộc tính
                </button>
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
<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{action('Admin\Prd\AttrGrController@addAttr',$attr_gr->id)}}" method="POST">
                @csrf
            <div class="modal-header">
              <h4 class="modal-title">Thêm thuộc tính</h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
              <select name="attr_id">
                @foreach ($attrs_not_in as $attr)
                <option value="{{$attr->id}}">{{$attr->name}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Thêm">
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
