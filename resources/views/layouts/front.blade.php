@include('includes.header')
@yield('content')
@include('modals.user_login')
@include('includes.footer')
<script src="{{asset('assets/js/main.js')}}"></script>
@include('scripts.front')
@yield('script')

