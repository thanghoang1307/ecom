@extends('layouts.app')
@section('title')
<i class="fas fa-images"></i>  Danh sách vị trí banner
@endsection
@section('content')
@foreach ($banner_positions as $position)
<ul>
<li>
<a href="{{route('admin.banner.position_edit',$position->id)}}">{{$position->name}}</a></li>
</ul>
@endforeach
@endsection
