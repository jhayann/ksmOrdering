<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('img/favicon.png')}}">
    <title>KSM CRYSTAL WATER</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ URL::to('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="{{ URL::to('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('css/creative.min.css') }}" rel="stylesheet">
    <link href="{{URL::to('css/preload.css')}}" rel="stylesheet">
    <style>

    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">KSM CRYSTAL WATER</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
@yield('contents')


    <!-- Bootstrap core JavaScript -->
    <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::to('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ URL::to('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ URL::to('js/creative.min.js') }}"></script>
    <script>
      $(document).ready(function(){
        $(".preloader").fadeOut();
      });
    </script>
  </body>

</html>
