@extends('layouts.app')
@section('content')

<div>Họ và tên: {{$customer->name}}</div>
<div>Giới tính: {{$customer->gender == 'male' ? 'Nam' : 'Nữ'}}</div>
<div>Email: {{$customer->email}}</div>
<div>Điện thoại: {{$customer->phone}}</div>

@endsection