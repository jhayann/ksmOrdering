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
    @yield('styles')
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
            <div class="header">
                @include('includes.navbar')
            </div>
            <div class="left-sidebar">
                <!-- Sidebar scroll-->
                @include('includes.sidebar')
            </div>
            <div class="page-wrapper">
               @yield('pagetitle')
                @yield('content')
            </div>
    </div>
	<script src="{{URL::to('js/lib/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{URL::to('js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{URL::to('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{URL::to('js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{URL::to('js/sidebarmenu.js')}}"></script>
    <!--stickey kit -->
    <script src="{{URL::to('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    
    <script src="{{ URL::to('js/lib/sweetalert/sweetalert.min.js')}}"></script>
    
    <script src="{{ URL::to('js/lib/datatables/datatables.min.js')}}"></script>
<script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::to('js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
    <!-- scripit init-->
    @yield('scripts')
    <!--Custom JavaScript -->
    <script src="{{URL::to('js/custom.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#adminlist').click(function(){
                poper('Please wait!','Working on it now ...');
                displayAdmin();
            });
            $('#productlist').click(function(){
                poper('Please wait!','Working on it now ...');
                displayProduct();
            });
            $('#create_admin').click(function(){
                    $.ajax({
                        type:"post",
                        url:"{{route('create_admin')}}",
                        data: {_token:"{{ Session::token()}}"},
                        success: function(data) {
                            $('#ajax').html(data);
                      
                        }, 
                        error: function(){
                             sweetAlert("Oops...", "Something went wrong !!", "error");
                        }
                });
            });
           
        });
        
        function displayAdmin()
        {
               $.ajax({
                        type:"post",
                        url:"{{route('adminlist')}}",
                        data: {_token:"{{ Session::token()}}"},
                        success: function(data) {
                            $('#ajax').html(data);
                        }, 
                        error: function(){
                             sweetAlert("Oops...", "Something went wrong !!", "error");
                        }
                       
                });
        }
        
        function displayProduct()
        {
             $.ajax({
                        type:"post",
                        url:"{{route('productlist')}}",
                        data: {_token:"{{ Session::token()}}"},
                        success: function(data) {
                            $('#ajax').html(data);
                        }, 
                        error: function(){
                             sweetAlert("Oops...", "Something went wrong !!", "error");
                        }
                       
                });
        }

        $('#customerlist').click(function(){
                poper('Please wait!','Working on it now ...');
                $.ajax({
                    type:"post",
                    url:"{{ route('customerlist') }}",
                    data:{_token: "{{ Session::token()}}"},
                    success: function (data){
                        $('#ajax').html(data);
                    },
                    error: function () {
                        sweetAlert("Oops...", "Something went wrong  while getting resellers!!", "error");
                    }
                });                
            });
           
       
        
        function confirmRem(e) 
        {
                $('.sweet-success-cancel').click(function(){
                                    swal({
            title: "Are you sure to delete ?",
            text: "You will not be able to recover this admin profile !!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it !!",
            cancelButtonText: "No, cancel it !!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
               swal("Deleted !!", "Hey, the admin profile has been deleted !!", "success");
                console.log(e);
                $.ajax({
                    url:"{{ route('deleteadmin') }}",
                    type:"post",
                    data:{_token:"{{Session::token()}}",id:e},
                    success: function()
                    {
                        displayAdmin();
                    },
                    error: function()
                    {
                    sweetAlert("Oops...", "Something went wrong  while deleting the admin profile", "error");
                    }

                });
            }
            else {
                swal("Cancelled !!", "Hey, the admin profile is safe !!", "error");
            }
        });
                });
        }
        
        function poper(e,r)
        {
        swal({
        title: e,
        text: r,
        timer: 2000,
        showConfirmButton: false
    });
        }  
    </script>
</body>

</html>
		
		
		