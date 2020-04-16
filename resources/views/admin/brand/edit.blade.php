@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-cube"></i>  Chỉnh sửa thương hiệu {{$brand->name}}
@endsection
@section('content')
    <!-- Main content -->
            <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<form method="POST" action="{{route('admin.brand.update',$brand->id)}}">
                @csrf
				<div class="card-header">
					<div class="row">
						<div class="col-md-6 col-12">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
						
						<div class="col-md-6 col-12" style="text-align: right;"><a href="{{route('admin.brand.delete',$brand->id)}}">
							<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
						</a></div>
					</div>
				</div>
	              <!-- /.card-header -->
	              <div class="card-body">
					<div class="form-group">
						<label>Tên thương hiệu</label>
						
						<input type="text" class="form-control" name="name" value="{{$brand->name}}">
					</div>
					
					<div class="form-group">
						<label>Slug</label>
						
						<input type="text" class="form-control" name="slug" value="{{$brand->slug}}">
					</div>
					<p style="margin-bottom: 0;"><label>Hình ảnh</label></p>
					<div class="input-group">
						<span class="input-group-btn">
				          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
				          <i class="fa fa-picture-o"></i> Choose
				          </a>
				          </span>
						
						<input id="thumbnail" class="form-control" type="text" name="logo" value="{{$brand->logo}}">
					</div>
					
					<div id="holder" style="margin-top:15px;max-height:100px;">
						<img src="{{$brand->logo}}" style="height:5rem;" />
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
