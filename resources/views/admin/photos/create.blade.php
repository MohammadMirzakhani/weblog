@extends('admin.layouts.master')
@section('dropzone.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
@endsection
@section('dropzone.js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.dropzonew = {
            paramName : "photos",
            maxFilesize : 5,
        };
    </script>
@endsection
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    <h3 class="p-g-2 text-capitalize"><p class="btn btn-primary">آپلود فایل </p></h3>
    <i class="btn btn-warning">...حجم تصاویر باید کمتر از پنج مگابایت باشد </i>
    <div class="row" ><br>
        <div class="col-md-5 offset-md-3`" >
        <form action="{{route('Photos.store')}}" method="POST" class="dropzone" id="dropzonew">
            @csrf

        </form>
    </div>
    </div>
</main>

@endsection
