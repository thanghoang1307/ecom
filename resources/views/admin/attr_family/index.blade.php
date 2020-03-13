@extends('layouts.app')
@section('title')
Danh sách nhóm sản phẩm
@endsection
@section('content')
<table>
	<tbody>
@foreach($attr_families as $family)
<tr>
	<td>{{$family->code}}</td>
	<td>{{$family->name}}</td>
	<td><a href="{{route('admin.attr_family.edit',$family->id)}}">Chỉnh sửa</a></td>
</tr>
@endforeach
</tbody>
</table>
@endsection