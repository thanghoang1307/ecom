@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-images"></i>  Danh sách vị trí banner
@endsection
@section('content')

<div class="row">     
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<!-- -->
			</div>
            <!-- /.card-header -->
            <div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 10px">#</th>
							
							<th>Vị trí banner</th>
							
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($banner_positions as $position)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{$position->name}}</td>
							<td>
								<a href="{{route('admin.banner.position_edit',$position->id)}}"><button class="btn btn-primary"><i class="fas fa-edit"></i></button></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
