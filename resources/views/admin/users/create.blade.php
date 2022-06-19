@extends('admin.layouts.master')
@section('body')
{{-- @foreach ($roles as $role)
<input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
<label for="{{ $role->id }}">{{ $role->title }}</label><br>
@endforeach --}}
<main id="main">
    <h3 class="p-g-2 text-capitalize">ایجاد کاربران</h3><br>

    <div class="d-flex justify-content-center" >
        <div class="col-lg-6`" >
        <form action="{{route('Users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">نام و نام خانوادگی</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">ایمیل</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{old('email')}}">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <i> <b>: نقش های مورد نظر را انتخاب کنید -</b> </i>
            <div class="form-group" >

                @foreach ($roles as $role)
                    <label for="{{ $role->id }}">{{ $role->title }}</label>
                    <input type="checkbox" value="{{ $role->id }}" id="{{ $role->id }}" name="o[]">
                    <br>
                @endforeach
                @error('o[]')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">رمز ورود</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <i> <b>: وضعیت کاربر مورد نظر را انتخاب کنید -</b> </i>
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
                <label for="PhotoProfile">عکس پروفایل</label>
                <input type="file" class="form-control @error('PhotoProfile') is-invalid @enderror" name="PhotoProfile"
                    value="{{old('PhotoProfile')}}">
                @error('PhotoProfile')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="title"></label>
                <button type="submit" class="btn btn-success"> ارسال</button>
            </div>

        </form>

    </div>
    </div>

</main>
@endsection
