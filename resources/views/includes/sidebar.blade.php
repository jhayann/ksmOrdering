 <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin',"")}}">Overview</a></li>
                     
                    </ul>
                </li>
                <li class="nav-label">STATION</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Products</span></a>
                       <ul>
                           <li><a href="{{ route('create.product')}}">Add Product</a></li>
                            <li><a href="#productlist" id="productlist">Manage Product</a></li>
                       </ul>
                </li>
                 <li> <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Orders <pan id="order1" class="badge badge-danger"></pan></span></a>
                    <ul>
                        <li><a href="{{ route('pendingorder') }}" id="">Pending orders <pan id="order2" class="badge badge-danger"></pan></a></li>
                        <!--    <li><a href="javascript:void(0);" id="create_admin">Create admin(ajax)</a></li>-->
                        <li><a href="{{ route('orderhistory') }}">Orders history</a></li>
                   </ul> 
                </li>          
             <li class="nav-label">MANAGEMENT</li>
                <li> <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Resellers</span></a>
                   <ul>
                        <li><a  href="javascript:void(0);" id="customerlist">Manage Resellers</a></li>
                        
                   </ul>                    
                </li>
                <li> <a href="#adminlist" class="has-arrow" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Admin</span></a>
                    <ul>
                        <li><a href="javascript:void(0);" id="adminlist">Admin List</a></li>
                        <!--    <li><a href="javascript:void(0);" id="create_admin">Create admin(ajax)</a></li>-->
                        <li><a href=" {{ route('admin','register')}}">Create admin</a></li>
                   </ul> 
                </li>
                <li class="nav-label">REPORTS</li>
                <li> <a href="#" class="has-arrow" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Sales Report</span></a>
                    
                </li>
            </ul>
        </nav>
    </div> 