@extends('layouts.app')
@section('content')
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Tên</th>
			<th>Email</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
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
				@csrf
				<input type="text" name="name" placeholder="Tên người dùng">
				<input type="text" name="email" placeholder="Email người dùng">
				<input type="password" name="new_password" placeholder="Mật khẩu">			
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
