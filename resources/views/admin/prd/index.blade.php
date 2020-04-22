@extends('layouts.app')
@section('title')
<i class="far fa fa-product-hunt nav-icon"></i> Danh sách sản phẩm
@endsection
@section('content')

<style>
	#page-top {
		padding-bottom: 0 !important;
	}

	#page-top .pagination {
		margin-bottom: 0 !important;
	}
</style>
<!-- Main content -->
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6 col-12">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i></button>
					</div>
					<div class="col-md-6 col-12" style="text-align: right;">
						<div class="form-group">
							<label>Lọc theo</label>
							<select class="form-control cat-filter" style="width: 50%; display: inline; margin-left: 10px;">
								<option selected="" value="all">Tất cả danh mục</option>
								@foreach ($cats as $cat)
								<option value="{{$cat->id}}">{{$cat->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="ajax-table">
				@include('admin.prd.table')

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
			<form action="{{action('Admin\Prd\PrdController@create')}}" method="POST">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Tạo sản phẩm mới</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label>Tên sản phẩm</label>

						<input class="form-control" type="text" name="name" placeholder="Tên sản phẩm">
					</div>

					<div class="form-group">
						<label>Slug</label>

						<input class="form-control" type="text" name="sku" placeholder="Mã sản phẩm">
					</div>

					<div class="form-group">
						<label>Nhóm thuộc tính</label>

						<select class="form-control" name="attr_family_id">@foreach ($attr_families as $attr_family)
							<option value="{{$attr_family->id}}">{{$attr_family->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Thương hiệu</label>

						<select class="form-control" name="brand_id">@foreach ($brands as $brand)
							<option value="{{$brand->id}}">{{$brand->name}}</option>
							@endforeach
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
@section('script')
<script>
	$(function() {
		$('select.cat-filter').on('change', function() {
			var cat_id = $(this).children("option:selected").val();
			$.ajax({
				type: 'POST',
				url: "{{route('admin.prd.filter')}}",
				data: {
					'_token': '{{csrf_token()}}',
					'cat_id': cat_id,
				},
				success: function(data) {
					console.log(data.html)
					$('.ajax-table').html(data.html);
				},
			});
		})
	})
</script>
@endsection