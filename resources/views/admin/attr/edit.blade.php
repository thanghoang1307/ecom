@extends('layouts.app')
@section('title')
Chỉnh sửa thuộc tính {{$attr->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <form method="POST" action="{{route('admin.attr.update',$attr->id)}}">
                @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group">
              <input type="text" class="form-control" name="code" value="{{$attr->code}}">
              </div> 
              <div class="form-group">
              <input type="text" class="form-control" name="name" value="{{$attr->name}}">
              </div> 
              <div class="form-group">
                <select class="form-control" name="type" placeholder="Loại thuộc tính">
                	<option value="text" selected=<?php echo $attr->type == 'text' ? true : ""?>>Chữ</option>
                	<option value="boolean" selected=<?php echo $attr->type == 'boolean' ? true : ""?>>Có/Không</option>
                	<option value="datetime" selected=<?php echo $attr->type == 'datetime' ? true : ""?>>Thời gian</option>
                	<option value="date" selected=<?php echo $attr->type == 'date' ? true : ""?>>Ngày tháng năm</option>
                	<option value="integer" selected=<?php echo $attr->type == 'integer' ? true : ""?>>Số nguyên</option>
                	<option value="float" selected=<?php echo $attr->type == 'float' ? true : ""?>>Thập phân</option>
                </select>
              </div>
              <div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="is_required" <?php echo $attr->is_required == 1 ? 'checked': ""?>>
          Bắt buộc
        </label>
              </div><div class="form-check">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="is_looped" <?php echo $attr->is_looped == 1 ? 'checked': ""?>>
          Hiển trị trong nội dung
        </label>
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
