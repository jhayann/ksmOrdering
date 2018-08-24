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
    <!-- Custom CSS -->
    <link href="{{URL::to('css/helper.css')}}" rel="stylesheet">
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">
    
    <style>
        .mymain {
            max-width: 1024px;
            margin:auto;
        }
        /* USER PROFILE PAGE */
 .card {
    margin-top: 0px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;
}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(5, 213, 255, 1);
}
.card.hovercard .prof {
    position: absolute;
    bottom: 10px;
    left: 0;
    right: 0;
}
.card.hovercard .prof .card-title {
    padding:0 5px;
    font-size: 25px;
    line-height: 1;
    color:#1ef0ff;
    font-family: Arial Black;
    text-shadow: 2px 2px 15px #FFFFFF;
 
}
.card.hovercard .prof {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
    
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}
.main-wrapper
{
    padding-top:0px;
    margin-top:0px;
}

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
        <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="{{URL::to('img/users/4.jpg')}}">
            <!-- http://lorempixel.com/850/280/people/9/ -->
        </div>
        <div class="useravatar">
            <img alt="" src="{{URL::to('img/users/4.jpg')}}">
        </div>
        <div class="prof"> <span class="card-title">{{ session('customer_email')}}</span>
        </div>
    </div>
        </div>
    </div>



<script src="{{URL::to('js/lib/jquery/jquery.min.js')}}"></script>
<script src="{{URL::to('js/lib/bootstrap/js/popper.min.js')}}"></script>
<script src="{{URL::to('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ URL::to('js/lib/sweetalert/sweetalert.min.js')}}"></script>
<script>
$(document).ready(function () {     
history.pushState(null, document.title, location.href);
window.addEventListener('popstate', function (event)
{
  history.pushState(null, document.title, location.href);
});
$(".btn-pref .btn").click(function () {
    $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).removeClass("btn-default").addClass("btn-primary");   
});
$('.preloader').fadeOut();

        });
        </script>
    </body>
</html>