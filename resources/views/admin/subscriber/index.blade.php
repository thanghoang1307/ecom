@extends('layouts.app')
@section('title')
<i class="nav-icon fas fa-cube"></i>  Danh sách đăng ký email
@endsection
@section('content')

<style>
#page-top {
	padding-bottom: 0!important;
}
#page-top .pagination {
	margin-bottom: 0!important;    
}
</style>
    <!-- Main content -->
            <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus"></i>
                </button>

              </div>
              <!-- /.card-header -->
			  
			  <div class="card-body" id="page-top">
                {{$subscribers->render()}}
              </div>
			  
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subscribers as $subscriber)
                    <tr>
                      <td>{{$subscriber->id}}</td>
                      <td>{{$subscriber->email}}</td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{$subscribers->render()}}
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
@endsection
