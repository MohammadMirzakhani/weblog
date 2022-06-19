@extends('admin.layouts.master')
@section('body')
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $NumberPhotos }}</h3>

          <p>عکس ها</p>
        </div>
        <div class="icon">
          <i class="ion ion-image"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $NumberPosts }}</h3>

          <p>پست ها</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $NumberUsers }}</h3>

          <p>کاربران ثبت شده</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ $NumberCategories }}</h3>

          <p>دسته بندی ها</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>          </div>
    </div>
    <!-- ./col -->
  </div>
  <div class="row">
    <div class="col-md-6">
        <h6 class="p-b-2">آخرین مطالب</h6>
        <table class="table table-hover bg-content" dir="rtl">
            <thead>
            <tr>
                <th>عنوان</th>
                <th>دسته بندی</th>
                <th>تاریخ ایجاد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lastPosts as $lastPost)
                <tr>
                    <td><a href="{{route('Posts.edit', $lastPost->slug)}}">{{$lastPost->title}}</a></td>
                    <td>{{$lastPost->category->title}}</td>
                    <td>{{\Hekmatinasser\Verta\Verta::instance($lastPost->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h6 class="p-b-2">لیست کاربران</h6>
        <table class="table table-hover bg-content" dir="rtl">
            <thead>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تاریخ ایجاد</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lastUsers as $lastUser)
                <tr>
                    <td><a href="{{route('Users.edit', $lastUser->name)}}">{{$lastUser->name}}</a></td>
                    <td>{{$lastUser->email}}</td>
                    <td>{{\Hekmatinasser\Verta\Verta::instance($lastUser->created_at)->format('%d/ %B/ %Y')}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
