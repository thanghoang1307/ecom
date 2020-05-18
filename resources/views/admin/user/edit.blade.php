@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-users"></i> Thông tin người dùng {{ $user->name }}
@endsection
@section('content')
<form action="{{route('admin.user.update',$user->id)}}" method="POST">
@csrf
<div class="form-group">
<label>Tên người dùng</label>
<input class="form-control" type="text" name="name" value="{{$user->name}}">
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" type="text" name="email" value="{{$user->email}}">
</div>
<div class="form-group">
<label>Mật khẩu</label>
<input class="form-control" type="password" name="password" value="{{$user->password}}">
</div>
<button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection
