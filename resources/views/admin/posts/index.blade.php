@extends('admin.layouts.master')
@section('body')

      <!-- Page Title Header Ends-->
      <ol class="breadcrumb"  dir="rtl" style="background-color: #800000">
        <li><a href="#"><i class="fa fa-dashboard"></i> <font size="+1" style="color: #FFF8DC"> خانه</font> </a></li>
        <li class="CodeMirror-activeline-background"><font size="+1" style="color: #FFF8DC"> داشبورد</font></li>
        <li class="active"><font size="+1" style="color: #FFF8DC"> مطالب</font></li>
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
            <h2>لیست مطالب</h2><br>
                <table class="table" aria-setsize="center">
                    <thead>
                        <tr >
                            <th></th>
                            <th scope="col" >#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">کاربر</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">دسته بندی</th>
                            <th scope="col">   وضعیت     </th>
                            <th scope="col">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            @if (!empty($post->photo))
                                @php
                                $url=$post->photo->path;
                                @endphp
                                <td><img src="{{ asset('/Images/Posts/'.$url.'') }}" alt="" width="50"></td>
                            @else
                            <td><img src="{{ asset('/Images/Posts/images.png') }}" alt="" width="50"  ></td>
                            @endif
                                <td scope="row">{{ $post->id }}</td>
                                <td><a href="{{ route('Posts.edit',$post->slug) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ Illuminate\Support\Str::limit($post->description,50) }}</td>
                                <td>{{ $post->category->title }}</td>
                            @if ($post->status==0)
                                <td class="label label-danger">غیر فعال</td>
                            @else
                                <td class="label label-success"> فعال</td>
                            @endif
                                <td>{{ Facades\Verta::instance($post->created_at)->format('%d/ %B/ %Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12" style="text-align: center">{{$posts->links()}}</div>

          </div>
        </div>
      </div>


@endsection
