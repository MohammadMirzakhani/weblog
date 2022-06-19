@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    <h3 class="p-g-2 text-center"> ویرایش نظر </h3>
    <div class="row">
        <div class="d-flex justify-content-center" >
            <div class="col-md-6" >
            <form action="{{route('comment.update',$comment->id)}}" method="POST" >
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="description"> متن نظر</label>
                    <textarea name="comment" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                        {{$comment->description}}
                    </textarea>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-success col-md-3"> بروزرسانی</button>
                </div>

            </form>
            <form action="{{ route('comment.destroy',$comment->id) }}" method="Post">
            @method('DELETE')
            @csrf
                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-danger col-md-3" style="padding-left:45px; font-size-lenght:55px;"> حذف</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</main>
@endsection
