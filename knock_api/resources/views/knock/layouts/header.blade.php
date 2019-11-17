<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="/" class="logo" style="font-size:15px;" onclick="resetActiveMenu()"><b>@yield('page_title',env('PROJECT_NAME'))</b></a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        @include('knock.layouts.topbar')
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav" style="float:right;">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bell-o" id="bell"></i>
                      <span class="label label-danger">{{count($alarms)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have {{count($alarms)}} notifications</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          <!-- <li>
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                          </li> -->
                          @foreach($alarms as $alarm)
                          <li>
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i> {{$alarm->police_name}} raised alarm! <br> <i class="fa fa-map-marker text-purple"></i>{{$alarm->lat}} {{$alarm->lan}}
                            </a>
                          </li>
                          @endforeach
                           
                        </ul>
                      </li>
                      <li class="footer"><a href="#">View all</a></li>
                    </ul>
                  </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                       
                        <img src="{{ asset("/knock/images/user_profile_images/t1.jpg") }}" class="user-image" alt="User Image"/>
                        
                         
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/knock/images/hackathon-logo.png") }}" class="img-circle" alt="User Image" />
                            
                        </li>

                         <li class="user-body">
                           s
                          
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                             <div class="pull-left">
                                <a href="{{URL::route('change_password')}}" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{URL::route('sign_out')}}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>