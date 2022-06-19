@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}


<main id="main">
<h3 class="p-g-2 text-center"> ویرایش کاربر {{ $User->name }}</h3>
    <div class="d-flex justify-content-center" >
       <div class="col-md-3">
        @if (count($User->photos)!=0)
            @foreach ($User->photos as $photo)
            @if ($photo->is_profile==1)
                @php
                $url=$photo->path;
                @endphp
                <td><img src="{{ asset('/Images/Profile/'.$url.'') }}" alt="" width="250"  ></td>
            @else
            <td><img src="{{ asset('/Images/Profile/Basic-User-Avatars-300x250.jpg') }}" alt="" width="50"></td>
            @endif
            @endforeach
        @else
        <td><img src="{{ asset('/Images/Profile/Basic-User-Avatars-300x250.jpg') }}" alt="" width="250"></td>
        @endif
       </div>
        <div class="col-md-9" >
        <form action="{{route('Users.update',$User->name)}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title">نام و نام خانوادگی</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$User->name}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$User->email}}">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <i> <b>: نقش های مورد نظر را انتخاب کنید -</b> </i>
            <div class="form-group" >

                @foreach ($roles as $role)
                    <label for="{{ $role->id }}">{{ $role->title }}</label>
                    <input type="checkbox" value="{{ $role->id }}"  id="{{ $role->id }}" name="o[]">
                    <br>
                @endforeach
                @error('o[]')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">رمز ورود</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$User->password}}">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <i> <b>: وضعیت کاربر مورد نظر را انتخاب کنید -</b> </i>
            <div class="form-group" >
                <label for="faal">فعال</label>
                  <input type="radio" id="faal" name="status" value="1" >
                  <br>
                <label for="natfaal">غیر فعال</label>
                  <input type="radio" id="natfaal" name="status" value="0">
                  <br>
                @error('status')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="PhotoProfile">عکس پروفایل</label>
                <input type="file" class="form-control @error('PhotoProfile') is-invalid @enderror"  name="PhotoProfile"
                    value="{{$User->photo}}">
                @error('PhotoProfile')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success col-md-3"> بروزرسانی</button>
            </div>

        </form>
       <form action="{{ route('Users.destroy',$User->name) }}" method="Post">
        @method('DELETE')
        @csrf
            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-danger col-md-3" style="padding-left:45px; font-size-lenght:55px;"> حذف</button>
            </div>
       </form>
    </div>
    </div>

</main>
@endsection
