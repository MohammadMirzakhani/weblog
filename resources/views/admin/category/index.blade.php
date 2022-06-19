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
            <h2>لیست دسته بندی ها</h2><br>
                <table class="table" aria-setsize="center">
                    <thead>
                        <tr >
                            <th scope="col" >#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                                <td scope="row">{{ $category->id }}</td>
                                <td><a href="{{ route('Categories.edit',$category->slug) }}">{{ $category->title }}</a></td>
                                <td>{{ Facades\Verta::instance($category->created_at)->format('%d/ %B/ %Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12" style="text-align: center">{{$categories->links()}}</div>
          </div>
        </div>
      </div>


@endsection
