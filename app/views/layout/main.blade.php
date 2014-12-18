<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CSCI15 Project 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/style.min.css') }}
    
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    
    {{ HTML::style('css/bootstrap-responsive.min.css') }}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="http://p4.jonathanjsogg.com">CSCI15</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <li><a href="/photopage">My Page</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
        @if (isset($errors) && count($errors->all()) > 0)
        <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Error:</h4>
            <ul>
            @foreach ($errors->all('<li>:message</li>') as $message)
            {{ $message }}
            @endforeach
            </ul>
        </div>
        @endif
        @yield('content')
        <hr>
    </div> <!-- /container -->
    @if (Auth::check())
	@include('uploads.uploadForm')
    @include('photopage.profileForm')
    @endif
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/jquery-2.1.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

  </body>
</html>




