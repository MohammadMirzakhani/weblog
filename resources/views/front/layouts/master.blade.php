<!DOCTYPE html>
<html lang="en" dir="rtl">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="">
    @yield('head')
    <title>وبلاگ روکسو</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset("front/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset("front/css/blog-post.css")}}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @yield('navigation')

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
           @yield('content')
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            @yield('sidebar')

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset("front/vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("front/vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

  </body>

</html>
