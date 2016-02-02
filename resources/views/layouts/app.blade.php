<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('/favicon.ico') }}">

    <title>Blog Template for Bootstrap</title>

    <link href="{{ asset(elixir('css/final.css')) }}" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <!-- link href="../../dist/css/bootstrap.min.css" rel="stylesheet" -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" -->

    <!-- Custom styles for this template -->
    <!-- link href="blog.css" rel="stylesheet" -->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- script src="../../assets/js/ie-emulation-modes-warning.js"></script -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    
    @include('partials.nav')

    <div class="container">
        @include('flash::message')
      <div class="blog-header">
        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
            
            @yield('content')

          <!-- nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          @include('partials.sidebar')
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script -->
    <!-- script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script -->
    <!-- script src="../../dist/js/bootstrap.min.js"></script -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- script src="../../assets/js/ie10-viewport-bug-workaround.js"></script -->
    
    <script src="{{ asset(elixir('js/final.js')) }}"></script>
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    @yield('footer')
  </body>
</html>
