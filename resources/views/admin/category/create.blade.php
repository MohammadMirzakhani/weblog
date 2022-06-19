@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    <h3 class="p-g-2 text-capitalize">ایجاد دسته بندی جدبد</h3><br>

    <div class="row" >
        <div class="col-md-6 offset-md-3`" >
        <form action="{{route('Categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">عنوان</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{old('title')}}">
                @error('title')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">نام مستعار</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                    value="{{old('slug')}}">
                @error('slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="meta_description"> متا توضیحات</label>
                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control @error('meta_description') is-invalid @enderror">
                    {{old('meta_description')}}
                </textarea>
                @error('meta_description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>   <div class="form-group">
                <label for="meta_keywords"> متا برچسب ها</label>
                <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control @error('meta_keywords') is-invalid @enderror">
                    {{old('meta_keywords')}}
                </textarea>
                @error('meta_keywords')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="submit"></label>
                <button type="submit" class="btn btn-primary"> ارسال</button>
            </div>
        </form>
    </div>
    </div>
</main>
@endsection
