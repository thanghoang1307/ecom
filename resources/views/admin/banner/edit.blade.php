@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-images"></i>  Chỉnh sửa {{$banner->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<form method="POST" action="{{route('admin.banner.update',$banner->id)}}">
                @csrf
				<div class="card-header">
					<div class="row">
						<div class="col-md-6 col-12">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						
						<div class="col-md-6 col-12" style="text-align: right;">
						</div>
					</div>
				</div>
	              <!-- /.card-header -->
	              <div class="card-body">
					<div class="form-group">
						<label>Tên banner</label>
						<input type="text" class="form-control" name="name" value="{{$banner->name}}">
					</div>
					
					<div class="form-group">
						<label>Liên kết của banner</label>
						<input type="text" class="form-control" name="link" value="{{$banner->link}}">
					</div>
					<p style="margin-bottom: 0;"><label>Hình ảnh</label></p>
					<div style="font-size: 12px; font-style: italic; color: gray; margin-bottom: 10px;">
					  	* Định dạng hỗ trợ: jpg (đề xuất), png, gif. Dung lượng file đề xuất < 100kb. Độ phân giải dề xuất: 72dpi.<br />
					  	Kích thước:<br />
					  	- Banner chính lớn: 863x412px
					  	- Banner chính nhỏ: 900x330px
					  	- Banner phụ: 300x110px
					  	- Banner giữa: 580x250px
					  	- Top banner: 1180x80px
					  </div>
					<div class="input-group"><span class="input-group-btn">
				          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
				          <i class="fa fa-picture-o"></i> Choose
				          </a>
				          </span>
						
						<input id="thumbnail" class="form-control" type="text" name="image" value="{{$banner->image}}">
					</div>
					
					<div id="holder" style="margin-top:15px;max-height:100px;">
						<img src="{{$banner->image}}" style="height:5rem;" />
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
@section('script')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
  $('#lfm').filemanager('image');
</script>
@endsection
