@extends('front.layouts.master')
@section('navigation')
    @include('front.layouts.nav',['categories'=>$categories,'carbon'=>$carbon])
@endsection
@section('sidebar')
    @include('front.layouts.sidebar',['categories'=>$categories])
@endsection
@section('content')
<h1 class="mt-4">  برای عبارت <p class="badge badge-info">{{ $query }}</p> جست وجو شده توسط شما </h1>
@if (count($posts)!=0)
    @foreach ($posts as $post)
        <h1 class="mt-4"> <a href="{{route('posts.show',$post->slug)}}"> {{ $post->title }}</a></h1>

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
        <div>{{ Illuminate\Support\Str::limit($post->description,330)}}</div>
        <div class="col-md-12 text-right">
        <a href="{{ route('posts.show',$post->slug)}}" class="btn btn-dark">ادامه مطلب</a>
        </div>
        <hr>

        <!-- Comments Form -->

    @endforeach
@else
        <br>
       <b style="font-size: 50px">  مطلب مورد نظر یافت نشد 😪 </b>

@endif

<!-- Title -->
<div class="col-md-2" style="text-align: center">{{ $posts->links() }}</div>
@endsection
