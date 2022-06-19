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
        <div class="col-md-3">
         @if ($Post->photo)
             @php
             $url=$Post->photo->path;
             @endphp
             <td><img src="{{ asset('/Images/Posts/'.$url.'') }}" alt="" width="250"  ></td>
         @else
             <td><img src="{{ asset('/Images/Posts/images.png') }}" alt="" width="250"></td>
         @endif
    </div>
     <div class="col-md-9" >
         <form action="{{route('Posts.update',$Post->slug)}}" method="POST" enctype="multipart/form-data">
             @method('put')
             @csrf
             <div class="form-group">
                 <label for="title">عنوان</label>
                 <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                     value="{{$Post->title}}">
                 @error('title')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
             </div>
             <div class="form-group">
                 <label for="title">نام مستعار</label>
                 <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug"
                     value="{{$Post->slug}}">
                 @error('slug')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
             </div>
             <div class="form-group" >
                 <label for="category">دسته بندی پست </label>
                 <select name="category" id="categories" class="form-control">
                     @foreach ($categories as $category)
                         <option value="{{ $category->id }}" @php if ($Post->category->id==$category->id) {echo 'selected';} @endphp>{{ $category->title }}</option>
                     @endforeach
                 </select>
             </div>
             <div class="form-group">
                 <label for="description"> توضیحات</label>
                 <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">
                     {{$Post->description}}
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
                     >
                 @error('FirstPhoto')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
             </div>
             <div class="form-group">
                 <label for="meta_description"> متا توضیحات</label>
                 <textarea name="meta_description" id="" cols="30" rows="10" class="form-control @error('meta_description') is-invalid @enderror">
                     {{$Post->meta_description}}
                 </textarea>
                 @error('meta_description')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
             </div>   <div class="form-group">
                 <label for="meta_keywords"> متا برچسب ها</label>
                 <textarea name="meta_keywords" id="" cols="30" rows="10" class="form-control @error('meta_keywords') is-invalid @enderror">
                     {{ $Post->meta_keywords }}
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
        <form action="{{ route('Posts.destroy',$Post->slug) }}" method="Post">
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
