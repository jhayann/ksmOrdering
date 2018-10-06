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
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::to('img/favicon.png')}}">
    <title>KSM Dashboard</title>
     <link href="{{ URL::to('css/lib/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href=" {{URL::to('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href=" {{URL::to('css/lib/md-bootstrap/mdbootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('css/helper.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">
    
    <style>
        .mymain {
            max-width: 1024px;
            margin:auto;
        }
        /* USER PROFILE PAGE */

    </style>
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
    <div id="main-wrapper">
        <div class="mymain">
            <!-- SideNav slide-out button -->
        
        <div class="container-fluid">
      <div class="row">
        <nav class="col-md-3 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky" style="height:100vh">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="home?token={{session('customer_token')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products?token={{session('customer_token')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="profile?token={{session('customer_token')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                  Profile
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="logout?token={{session('customer_token')}}">
                <i class="fa fa-power-off" style="font-size:25px;"></i>
                  Logout
                </a>
              </li>
            </ul>


          </div>
        </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Customer Dashboard</li>
        </ol>
    </nav>
<div class="card" >
    <div class="card-header">
        Overview
    </div>
    <div class="card-body">
   @include('customer.customer_summary')
        @yield('contents')
    </div>
</div>


</main>
</div>
</div>
<!--/. Sidebar navigation -->
        </div>
  
    </div>



<script src="{{URL::to('js/lib/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('js/lib/bootstrap/js/popper.min.js')}}"></script>
<script src="{{URL::to('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::to('js/lib/sweetalert/sweetalert.min.js')}}"></script>
<script type="{{URL::to('js/lib/md-bootstrap/mdbootstrap.min.js')}}"></script>
<script>
$(document).ready(function () {     
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});

$('.preloader').fadeOut();
// SideNav Button Initialization
$(".button-collapse").sideNav();
// SideNav Scrollbar Initialization

        });

        </script>
    </body>
</html>