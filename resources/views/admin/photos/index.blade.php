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
      @if (session('store'))
        <div class="alert alert-info fade in">{{  session('store')}}</div>
      @endif
     <div class="row" dir="rtl">
          <div class="col-lg-12">
          <div class="card-body">
            <h2>لیست فایل ها</h2><br>
            <form action="{{ route('photodelete') }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="form-group">
                    <input type="submit" value="حذف موارد انتخابی" class="btn btn-soundcloud">
                </div>
                <table class="table" aria-setsize="center">
                    <thead>
                        <tr >
                            <th><input type="checkbox" name="" id=""></th>
                            <th scope="col" >#</th>
                            <th scope="col">تصویر</th>
                            <th scope="col">کاربر</th>
                            <th scope="col">تاریخ ایجاد</th>
                            <th scope="col">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($photos as $photo)
                        <tr>
                                <td><input type="checkbox" name="photo[]" value="{{ $photo->id }}" multiple></td>
                                <td scope="row">{{ $photo->id }}</td>
                                @if ($photo->is_profile==1)
                                    @php
                                    $url=$photo->path;
                                    @endphp
                                    <td><img src="{{ asset('/Images/Profile/'.$url.'') }}" alt="" width="75"  ></td>
                                @else
                                    @php
                                    $url=$photo->path;
                                    @endphp
                                    <td><img src="{{ asset('/Images/Posts/'.$url.'') }}" alt="" width="75"  ></td>
                                @endif
                                <td scope="row">{{ $photo->photoable->name }}</td>
                                <td>{{ Facades\Verta::instance($photo->created_at)->format('%d/ %B/ %Y')}}</td>
                                <td>
                                    <form action="{{ route('Photos.destroy',$photo->id) }}" method="Post">
                                        @method('DELETE')
                                        @csrf
                                            <div class="form-group">
                                                <label for="title"></label>
                                                <button type="submit" class="btn btn-danger col-md-3" style="padding-left:45px; font-size-lenght:55px;"> حذف</button>
                                            </div>
                                    </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
                <div class="col-md-12" style="text-align: center">{{$photos->links()}}</div>
          </div>
        </div>
      </div>


@endsection
