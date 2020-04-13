@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-users"></i>  Danh sách quản trị viên
@endsection
@section('content')
<table class="table table-bordered">
	<thead>
		<tr>
			<th width="30%" style="vertical-align: middle;">Tên</th>
			<th width="50%" style="vertical-align: middle;">Email</th>
			<th width="20%" style="vertical-align: middle;">Hành động</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td style="vertical-align: middle;">{{$user->name}}</td>
			<td style="vertical-align: middle;">{{$user->email}}</td>
			<td>
				@if($user->role !== 0)
				<form action="{{route('admin.user.delete',$user->id)}}" method="POST">
					@csrf
				<button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
				</form>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Thêm người dùng</button>
@endsection
@section('modal')
<div class="modal fade" id="addUser">
	<div class="modal-dialog">
		<div class="modal-content">
		<form action="{{route('admin.user.create')}}" method="POST">
		<div class="modal-header">
			<div class="modal-title">
				Tạo người dùng mới
			</div>
		</div>
		<div class="modal-body">
				<div class="container" style="padding: 10; margin: 10;">
					@csrf
					<div style="margin: 10px;"><input style="border: 1px solid #eee; border-radius: 5px; height: 50px;" type="text" name="name" placeholder="Tên người dùng"></div>
					<div style="margin: 10px;"><input style="border: 1px solid #eee; border-radius: 5px; height: 50px;" type="text" name="email" placeholder="Email người dùng"></div>
					<div style="margin: 10px;"><input style="border: 1px solid #eee; border-radius: 5px; height: 50px;" type="password" name="new_password" placeholder="Mật khẩu"></div>
				</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Tạo</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
		</div>
	</form>
	</div>
	</div>
</div>
@endsection
