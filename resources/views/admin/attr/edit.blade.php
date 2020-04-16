@extends('layouts.app')
@section('title')
<i class="far fa-circle nav-icon"></i>  Chỉnh sửa thuộc tính {{$attr->name}}
@endsection
@section('content')
<!-- Main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<form method="POST" action="{{route('admin.attr.update',$attr->id)}}">
		        @csrf
				<div class="card-header">
					<div class="row">
						<div class="col-md-6 col-12">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						
						<div class="col-md-6 col-12" style="text-align: right;">
							<a href="{{route('admin.attr.delete',$attr->id)}}"><button class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
						</div>
					</div>
					
				</div>
		        <!-- /.card-header -->
		        <div class="card-body">
					<div class="form-group">
						<label>Tên thuộc tính</label>
						<input type="text" class="form-control" name="name" value="{{$attr->name}}">
					</div>
					
					<div class="form-group">
						<label>Mã thuộc tính</label>
						<input type="text" class="form-control" name="code" value="{{$attr->code}}">
					</div>
					
					<div class="form-group">
						<label>Loại thuộc tính</label>
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
					
					<div class="form-group">
						<label >Vị trí</label>
						
						<input class="form-control" type="number" step="1" name="position" value="{{$attr->position ?? ''}}">
					</div>
					
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="is_required" <?php echo $attr->is_required == 1 ? 'checked': ""?>>Bắt buộc
						</label>
					</div>
					
					<div class="form-check">
						<label class="form-check-label">
							<input class="form-check-input" type="checkbox" name="is_looped" <?php echo $attr->is_looped == 1 ? 'checked': ""?>>Hiển trị trong nội dung
						</label>
					</div>
				</div>
			      <!-- /.card-body -->
			      <div class="card-footer clearfix">
					<button type="submit" class="btn btn-primary">Save</button>
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
