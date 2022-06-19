@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    
    <h3 class="p-g-2 text-capitalize">ایجاد مطلب جدید</h3><br>

    <div class="row" >
        <div class="d-flex justify-content-center" >
            
            <div class="col-md-3">
             
                <table class="table" aria-setsize="center" dir="rtl">
                    <thead>
                        <tr >
                            <th scope="col">مطالب موجود</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                                <td scope="row">{{ $post->title }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 offset-md-1`" >
        <form action="{{route('Posts.store')}}" method="POST" enctype="multipart/form-data">
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
            <div class="form-group" >
                <label for="category">دسته بندی پست </label>
                <select name="category" id="categories" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="description"> توضیحات</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                    {{old('description')}}
                </textarea>
                @error('description')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <i> <b>: وضعیت پست مورد نظر را انتخاب کنید -</b> </i>
            <div class="form-group" >
                <label for="faal">فعال</label>
                  <input type="radio" id="faal" name="status" value="1">
                  <br>
                <label for="natfaal">غیر فعال</label>
                  <input type="radio" id="natfaal" name="status" value="0">
                  <br>
                @error('status')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="FirstPhoto">عکس پست</label>
                <input type="file" class="form-control @error('FirstPhoto') is-invalid @enderror" name="FirstPhoto"
                    value="{{old('FirstPhoto')}}">
                @error('FirstPhoto')
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
                <button type="submit" class="btn btn-success"> ارسال</button>
            </div>
        </form>
    </div>
    </div>
</main>
@endsection
