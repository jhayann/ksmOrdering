<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Page not Found</title>
    <!-- Bootstrap Core CSS -->
   <link href=" {{URL::to('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('css/helper.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div class="error-page" id="wrapper">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>404</h1>
                <h3 class="text-uppercase">Page not found </h3>
                <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
               <p class="text-muted m-t-30 m-b-30">  {{ $exception->getMessage() }}</p>
                <a class="btn btn-info btn-rounded waves-effect waves-light m-b-40" href="{{ route('index')}}">Back to home</a> </div>
            <footer class="footer text-center">&copy; 2018 KSM Waters</footer>
        </div>
    </div>
    <!-- End Wrapper -->

    
    
    	<script src="{{URL::to('js/lib/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::to('js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{URL::to('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::to('js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->

    <!--stickey kit -->
    
    <script src="{{ URL::to('js/custom.min.js')}}"></script>


</body>

</html>