@extends('admin.layouts.master')
@section('body')

      <!-- Page Title Header Ends-->
      <ol class="breadcrumb"  dir="rtl" style="background-color: #800000">
        <li><a href="#"><i class="fa fa-dashboard"></i> <font size="+1" style="color: #FFF8DC"> خانه</font> </a></li>
        <li class="CodeMirror-activeline-background"><font size="+1" style="color: #FFF8DC"> داشبورد</font></li>
        <li class="active"><font size="+1" style="color: #FFF8DC"> نظرات</font></li>
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
            <h2>لیست نظرات</h2><br>
                <table class="table" aria-setsize="center">
                    <thead>
                        <tr >
                            <th scope="col" >#</th>
                            <th scope="col">متن نظر</th>
                            <th scope="col">مطلب نظر</th>
                            <th scope="col"> وضعیت</th>
                            <th scope="col">تاریخ ایجاد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                        <tr>
                                <td scope="row">{{ $comment->id }}</td>
                                <td><a href="{{ route('comment.edit',$comment->id) }}">{{ $comment->description }}</a></td>
                                <td scope="row">{{$comment->post->title}}</td>
                            @if ($comment->status==1)
                                <td>
                                    <form action="{{ route('comment.updatestatus',$comment->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="label label-success"> فعال</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('comment.updatestatus',$comment->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="label label-danger"> غیر فعال</button>
                                    </form>
                                </td>
                            @endif
                                <td>{{ Facades\Verta::instance($comment->created_at)->format('%d/ %B/ %Y')}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12" style="text-align: center">{{$comments->links()}}</div>
          </div>
        </div>
      </div>
@endsection
