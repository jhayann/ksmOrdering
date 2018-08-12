<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ URL::to('vendor/bootstrap/css/bootstrap.min.css')}}">

    <!-- Custom styles for this template -->
@yield('styles')
</head>

    
<body>


@yield('contents')


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>