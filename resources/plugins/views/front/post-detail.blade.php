@extends('layouts.front')

@section('content')
<main id="one-stop-news-detail" class="main news-page">
  <div class="container">
@if($post->post_type != 'page')
 @include('includes.post_type')
@else
@include('includes.page_type')
@endif
  </div>
</main>
@endsection