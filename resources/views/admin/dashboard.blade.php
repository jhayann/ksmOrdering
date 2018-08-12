@extends('layouts.dashboardLayout')


@section('styles')


@endsection


@section('contents')

<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
       <div class="navbar-header">
        <a class="navbar-brand" href="index.html">
            <!-- Logo icon -->
            <b><img src="{{ URL::to('img/logo.png') }}" alt="homepage" class="dark-logo" /></b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span><img src="{{URL::to('img/logo-text.png')}}" alt="homepage" class="dark-logo" /></span>
        </a>
        </div>
        <div class="navbar-collapse">
                               <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                    
                        <!-- End Messages -->
                    </ul>
            <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is title</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="#">
                                                <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>This is another title</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
     
                        <!-- End Messages -->
                        <!-- Profile -->
                 
						<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ URL::to('img/users/avatar-3.jpg')}}" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="{{ URL::to('img/users/avatar-3.jpg')}}" alt="user"></div>
                                            <div class="u-text">
                                                <h4>Michael John</h4>
                                                <p class="text-muted">Zebra Theme@gmail.com</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
        </div>        
    </nav>
</div>

<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="index.html">Ecommerce </a></li>
                        <li><a href="index1.html">Analytics </a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Products</span></a>
                       <ul>
                           <li><a href="#">Add Product</a></li>
                            <li><a href="#">Manage Product</a></li>
                       </ul>
                </li>
                <li> <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customers</span></a>
                   <ul>
                        <li><a href="#">My Resellers</a></li>
                        <li><a href="#">Resellers Info</a></li>
                   </ul>                    
                </li>
                <li> <a href="#" class="" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a>
                    
                </li>
                <li> <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Sales Report</span></a>
                    
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="page-wrapper">

</div>
@endsection


@section('scripts')
 

@endsection