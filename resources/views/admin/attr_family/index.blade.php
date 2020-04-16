@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-cube"></i>  Nhóm thuộc tính sản phẩm
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
				<div class="modal-title">Tạo nhóm sản phẩm</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			</div>
			<div class="modal-body">
				<input type="text" name="name" placeholder="Tên nhóm sản phẩm">
				<input type="text" name="code" placeholder="Mã nhóm sản phẩm">
			</div>
			<div class="modal-footer">
				<button type="submit">Tạo</button>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Huỷ</span>
        </button>
			</div>

			</form>
		</div>
	</div>
</div>
@endsection