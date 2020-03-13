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
                	<option value="text" {{$attr->type == 'text' ? 'selected' : ''}}>Chữ</option>
                	<option value="boolean" {{$attr->type == 'boolean' ? 'selected' : ''}}>Có/Không</option>
                	<option value="datetime" {{$attr->type == 'datetime' ? 'selected' : ''}}>Thời gian</option>
                	<option value="date" {{$attr->type == 'date' ? 'selected' : ''}}>Ngày tháng năm</option>
                	<option value="integer" {{$attr->type == 'integer' ? 'selected' : ''}}>Số nguyên</option>
                	<option value="float" {{$attr->type == 'float' ? 'selected' : ''}}>Thập phân</option>
                  <option value="textarea" {{$attr->type == 'textarea' ? 'selected' : ''}}>Đoạn văn bản</option>
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
