@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    <h3 class="p-g-2 text-center"> ویرایش مطلب </h3>
    <div class="row">
        <div class="d-flex justify-content-center" >
            <div class="col-md-6" >
            <form action="{{route('Categories.update',$Category->slug)}}" method="POST" >
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                        value="{{$Category->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">نام مستعار</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                        value="{{$Category->slug}}">
                    @error('slug')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="meta_description"> متا توضیحات</label>
                    <textarea name="meta_description" id="" cols="30" rows="10" class="form-control @error('meta_description') is-invalid @enderror">
                        {{$Category->meta_description}}
                    </textarea>
                    @error('meta_description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>   <div class="form-group">
                    <label for="meta_keywords"> متا برچسب ها</label>
                    <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control @error('meta_keywords') is-invalid @enderror">
                        {{ $Category->meta_keywords }}
                    </textarea>
                    @error('meta_keywords')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-success col-md-3"> بروزرسانی</button>
                </div>

            </form>
            <form action="{{ route('Categories.destroy',$Category->slug) }}" method="Post">
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
