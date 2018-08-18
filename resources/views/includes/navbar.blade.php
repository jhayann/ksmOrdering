<nav class="navbar top-navbar navbar-expand-md navbar-cyan">
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
								@if(count($notifications)>=1)<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
								@endif
							</a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center" id="notif">
                                            <!-- Message -->
                                              @include('includes.notification')
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
                                                <h4>Rey Jhon</h4>
                                                <p class="text-muted">reyjhonbaquirin@yahoo.com</p><a href="pages-profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
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
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a></li>
                                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
        </div>        
    </nav>