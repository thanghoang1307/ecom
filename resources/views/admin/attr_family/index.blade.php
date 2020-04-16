@extends('layouts.app')
@section('title')
<i class="far fas fa-object-group nav-icon"></i>  Nhóm thuộc tính sản phẩm
@endsection
@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<button type="button" data-toggle="modal" data-target="#createAttrFamily" class="btn btn-primary"><i class="fas fa-plus"></i></button>
			</div>
            <!-- /.card-header -->
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nhóm thuộc tính cấp 1</th>
							
							<th>Mã nhóm</th>
							
							<th>Hành động</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach($attr_families as $family)
						<tr>
							<td>{{$family->name}}</td>
							
							<td>{{$family->code}}</td>
							
							<td><a href="{{route('admin.attr_family.edit',$family->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('modal')

<div id="createAttrFamily" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{route('admin.attr_family.create')}}" method="POST">
				@csrf
				<div class="modal-header">
					<div class="modal-title">Tạo nhóm thuộc tính cấp 1</div>
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				
				<div class="modal-body">
					<div class="form-group">
						<label>Tên nhóm thuộc tính</label>
						
						<input class="form-control" type="text" name="name" placeholder="Tên nhóm thuộc tính">
					</div>
					
					<div class="form-group">
						<label>Mã nhóm</label>
						
						<input class="form-control" type="text" name="code" placeholder="Mã nhóm thuộc tính">
					</div>
				</div>
				
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
					<input type="submit" class="btn btn-primary" value="Tạo">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection