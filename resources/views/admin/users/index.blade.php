@extends('admin.layouts.master')
@section('body')

      <!-- Page Title Header Ends-->
      <ol class="breadcrumb"  dir="rtl" style="background-color: #800000">
        <li><a href="#"><i class="fa fa-dashboard"></i> <font size="+1" style="color: #FFF8DC"> خانه</font> </a></li>
        <li class="active"><font size="+1" style="color: #FFF8DC"> داشبورد</font></li>
      </ol>
      @if (session('delete'))
        <div class="alert alert-danger fade in">{{  session('delete')}}</div>
      @endif
      @if (session('update'))
        <div class="alert alert-success fade in">{{  session('update')}}</div>
     @endif
     @if (session('store'))
        <div class="alert alert-info fade in">{{  session('store')}}</div>
     @endif
      <div class="row" dir="rtl">
          <div class="col-lg-12">
          <div class="card-body">
            <h3>لیست کاربران</h3>
                <table class="table" aria-setsize="center">
                    <thead>
                        <tr >
                            <th></th>
                            <th scope="col" >#</th>
                            <th scope="col">نام</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">نقش</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=0;
                        @endphp
                        @foreach ($users as $user)
                        @php
                            $i=$i+1;
                        @endphp
                        <tr>
                            @if(count($user->photos)!=0)
                                @foreach ($user->photos as $photo)
                                    @if ($photo->is_profile==1)
                                        @php
                                        $url=$photo->path;
                                        @endphp
                                        <td><img src="{{ asset('/Images/Profile/'.$url.'') }}" alt="" width="50"  ></td>
                                    @else
                                    <td><img src="{{ asset('/Images/Profile/Basic-User-Avatars-300x250.jpg') }}" alt="" width="50"></td>
                                    @break
                                    @endif
                                @endforeach
                            @else
                                <td><img src="{{ asset('/Images/Profile/Basic-User-Avatars-300x250.jpg') }}" alt="" width="50"></td>
                            @endif
                                <td scope="row">{{ $user->id }}</td>
                                <td><a href="{{ route('Users.edit',$user->name) }}">{{ $user->name }}</a></td>
                            @if ($i%2==0)
                                <td><i class="btn btn-danger">{{ $user->email }}</i></td>
                            @else
                                <td><i class="btn btn-success">{{ $user->email }}</i></td>
                            @endif
                                <td>
                                    @foreach ($user->roles as $role )
                                        <i class="btn btn-primary">{{ $role->title }}</i>
                                    @endforeach
                                </td>
                            @if ($user->status==0)
                                <td class="label label-danger">غیر فعال</td>
                            @else
                                <td class="label label-success"> فعال</td>
                            @endif
                                <td><i class="btn btn-facebook">{{ Facades\Verta::instance($user->created_at)->format('%d/ %B/ %Y')}}</i></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <div class="col-md-12" style="text-align: center">{{$users->onEachSide(3)->links()}}</div>
          </div>
        </div>
      </div>


@endsection
