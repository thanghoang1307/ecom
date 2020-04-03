@extends('layouts.app')
@section('content')

<?php $type = ($customer->password || $customer->provider) ? 'customer' : 'guest' ?>

<div>Họ và tên: {{$customer->name}}</div>
<div>Giới tính: {{$customer->gender == 'male' ? 'Nam' : 'Nữ'}}</div>
<div>Loại: {{ $type == 'customer' ? 'Thành viên' : 'Khách'}}</div>
<div>Email: {{$customer->email}}</div>
<div>Điện thoại: {{$customer->phone}}</div>

@endsection