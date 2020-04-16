@extends('layouts.app')
@section('title')
<i class="far fas fa-object-group nav-icon"></i>  Chỉnh sửa nhóm thuộc tính {{$family->name}}
@endsection
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-6 col-12">
						<!--<button type="button" data-toggle="modal" data-target="#attrGrForm" class="btn btn-primary">Tạo nhóm thuộc tính cấp 2</button>-->
					</div>
					
					<div class="col-md-6 col-12" style="text-align: right;"><a href="{{route('admin.attr_family.delete',$family->id)}}">
						<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</a></div>
				</div>
			</div>
            <!-- /.card-header -->
			<div class="card-body">
				<p><button type="button" data-toggle="modal" data-target="#attrGrForm" class="btn btn-primary">Tạo nhóm thuộc tính cấp 2</button></p>
				<p><strong>Danh sách nhóm thuộc tính cấp 2</strong></p>
				
				@foreach($family->attr_grs()->orderBy('position')->get() as $attr_gr)
				
				<div class="accordion" id="accordion-{{$attr_gr->id}}">
					<div class="card">
						<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#{{str_replace(' ','-',$attr_gr->name)}}">Nhóm {{$attr_gr->name}}</div>
						
						<div id="{{str_replace(' ','-',$attr_gr->name)}}" class="collapse" data-parent="#accordion-{{$attr_gr->id}}">
							<div class="card-body">
								<table class="table table-borderless">
									<thead>
										<th>Tên thuộc tính</th>
										
										<th>Mã thuộc tính</th>
										
										<th>Loại dữ liệu</th>
										
										<th colspan="2" style="text-align: center;">Hành động</th>
									</thead>
									
									<tbody>
										@foreach($attr_gr->attrs as $attr)
										<tr>
											<td>{{$attr->name}}</td>
											
											<td>{{$attr->code}}</td>
											
											<td>{{$attr->type}}</td>
											
											<td style="text-align: right;"><a href="{{route('admin.attr.edit',$attr->id)}}">
												<button class="btn btn-primary"><i class="fas fa-edit"></i></button>
											</a></td>
											
											<td>
												<form action="{{route('admin.attr_family.delete_attr',$attr->id)}}" method="POST">@csrf
													<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
												</form>
											</td>
										</tr>
										@endforeach
										
										<tr>
											<td colspan="5">
												<button class="btn btn-primary add-attr-btn" type="button" id="addAttrBtn" data-toggle="modal" data-target="#attrForm" data-id="{{$attr_gr->id}}" data-title="{{$attr_gr->name}}"><i class="fas fa-plus"></i></button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
							<div class="card-footer clearfix">
								<form class="form-inline" style="float:left;"action="{{route('admin.attr_family.delete_attr_gr',$attr_gr->id)}}" method="POST">@csrf
									<button type="submit" class="btn btn-danger deleteAttrGrBtn">Xoá nhóm {{$attr_gr->name}}</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection




@section('modal')

<div id="attrGrForm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('admin.attr_family.create_attr_gr')}}" method="POST">
				@csrf
				<div class="modal-header">
					<div class="modal-title">Tạo nhóm thuộc tính cấp 2</div>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body">
					<div class="form-group">
						<label>Tiêu đề bài viết</label>
						
						<input type="text" class="form-control" name="name" value="Tên nhóm thuộc tính">
					</div>
					
					<div class="form-group">
						<label>Vị trí</label>
						
						<input type="number" class="form-control" name="position" value="Vị trí">
					</div>
					
					<input type="hidden" name="attr_family_id" value="{{$family->id}}">
				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tạo</button>
					
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="attrForm" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('admin.attr_family.add_attr')}}" method="POST">
				@csrf
				<div class="modal-header">
					<div class="modal-title add-attr-title">Thêm thuộc tính vào nhóm </div>     
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body" style="overflow-y: overlay; max-height: 50vh;">			
					@foreach($attrs as $attr)
					<div>
						<input type="checkbox" name="{{$attr->code}}" value="{{$attr->id}}">
						
						<label>{{$attr->name}}</label>
					</div>
					@endforeach
					
					<input type="hidden" name="attr_gr_id" value="">
				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Tạo</button>
					
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
$(function() {
	$('.add-attr-btn').on('click', function() {
		$('#attrForm input[name="attr_gr_id"]').val($(this).data('id'));
		$('#attrForm .add-attr-title').append($(this).data('title'));
	});
});
</script>

@endsection