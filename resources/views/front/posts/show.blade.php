@extends('front.layouts.master')
@section('head')
    <meta name="description" content="{{ $post->meta_description }}">
    <meta name="keywords" content="{{ $post->meta_keywords }}">
@endsection
@section('navigation')
    @include('front.layouts.nav',['categories'=>$categories,'carbon'=>$carbon])
@endsection
@section('sidebar')
    @include('front.layouts.sidebar',['categories'=>$categories])
@endsection
@section('content')
<h1 class="mt-4"> {{ $post->title }}</h1>
<!-- Author -->
<p class="lead"> ایجاد شده توسط <a href="#">{{ $post->user->name }}</a>
</p>

<hr>

<!-- Date/Time -->
<p> منتشر شده در تاریخ <i class="badge badge-info">{{ Facades\Verta::instance($post->created_at)->format('%d/ %B/ %Y')}}</i> </p>

<hr>

<!-- Preview Image -->
    @if (!empty($post->photo))
        @php
        $url=$post->photo->path;
        @endphp
        <td><img class="img-fluid rounded"  src="{{ asset('/Images/Posts/'.$url.'') }}" alt=""></td>
    @else
    @endif
<hr>

<!-- Post Content -->
<div>{{$post->description}}</div>
<hr>

<!-- Comments Form -->
<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">
      <form>
        <div class="form-group">
          <textarea class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <!-- Single Comment -->
  <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
      <h5 class="mt-0">Commenter Name</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
    </div>
  </div>

  <!-- Comment with nested comments -->
  <div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
    <div class="media-body">
      <h5 class="mt-0">Commenter Name</h5>
      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

      <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>

      <div class="media mt-4">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
          <h5 class="mt-0">Commenter Name</h5>
          Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>

    </div>
  </div>
<!-- Title -->
@endsection
