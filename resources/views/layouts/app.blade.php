<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/toastr/toastr.css')}}">
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<style>
	.btn-danger {
		margin-left: 15px;
	}
</style>
<body>

  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">


      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
		<div style="border-bottom: 1px solid #4f5962; margin-top: 20px;">
			<h4 style="color: #c2c7d0;"><a style="color:#c2c7d0;" href="{{route('front.index')}}" target="_blank">{{ config('app.name') }}</a></h4>
		  <h6 style="color: #c2c7d0;">Control Panel</h6>
	  </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
		  	<a href="#" class="d-block"><h6>{{Auth::user()->name}}</h6></a>
            <a href="{{route('admin.user.logout')}}" style="font-size: 0.8em;">[ Đăng xuất ]</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-close">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Quản lý sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.prd.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.cat.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.brand.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý thương hiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.attr_family.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý nhóm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.attr.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý thuộc tính</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item ">
            <a href="{{route('admin.customer.index')}}" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Quản lý khách hàng
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('admin.order.index')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Quản lý đơn hàng
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.post.index')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Quản lý bài viết
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.banner.index')}}" class="nav-link">
              <i class="fas fa-images"></i>
              <p>
                Quản lý banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.setting.index')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Cài đặt
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Quản lý người dùng
              </p>
            </a>
          </li>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('title')</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        @if ($errors->any())
        <div class="alert alert-danger">
        <ul class="my-2">
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
        @endif
        @yield('content')
        @yield('modal')
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</body>
</html>
@if(Session::has('success'))
<div id="toast-container" class="toast-top-right"><div class="toast toast-success" aria-live="polite" style=""><div class="toast-message">{{session('success')}}</div></div></div>
@endif
@if(Session::has('error'))
<div id="toast-container" class="toast-top-right"><div class="toast toast-error" aria-live="assertive" style=""><div class="toast-message">{{session('error')}}</div></div></div>
@endif
<script src="{{ asset('js/app.js') }}"></script>
<script>
  function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }
  $(function(){ 
    $('.price').each(function(){
      $(this).html(numberWithCommas($(this).html()));
    });
  });
</script>
<script>
$('#toast-container').delay(3000).fadeOut(300);
</script>
@yield('script')
