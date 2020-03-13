@extends('layouts.app')
@section('title')
Danh sách nhóm sản phẩm
@endsection
@section('content')
<table class="table table-bordered">
	<tbody>
@foreach($attr_families as $family)
<tr>
	<td>{{$family->code}}</td>
	<td>{{$family->name}}</td>
	<td><a href="{{route('admin.attr_family.edit',$family->id)}}" class="btn btn-primary">Chỉnh sửa</a></td>
</tr>
@endforeach
</tbody>
</table>
<button type="button" data-toggle="modal" data-target="#createAttrFamily" class="btn btn-primary">Thêm nhóm sản phẩm</button>
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