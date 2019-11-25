@include('partials/header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('home')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>ART </b>Software</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">@if (!Auth::user()) Guest @else {{Auth::user()->name}} @endif</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  @if (!Auth::user()) Guest @else {{Auth::user()->name}}  - Web Developer @endif
                  <small>Member since Nov. 2018</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@if (!Auth::user()) Guest @else {{Auth::user()->name}} @endif</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div><<br>

      <!-- search form (Optional)
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
       /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><h4><p class="fa fa-link"></p> CRUD basic</h4></li>
        <li><a href="{{url('category')}}"><i class="fa fa-book"></i> <span>Categories</span></a></li>
        <li><a href="{{url('car')}}"><i class="fa fa-car"></i> <span>Cars</span></a></li>
        <li><a href="{{url('posts')}}"><i class="fa fa-industry"></i> <span>Posts</span></a></li>
        <li><a href="{{url('people')}}"><i class="fa fa-users"></i> <span>People</span></a></li>
        @can('isAdmin')
        <li class="header"><h4><p class="fa fa-external-link-square"></p> CRUD advanced</h4></li>
        <li><a href="{{url('courses')}}"><i class="fa fa-briefcase"></i> <span>Courses</span></a></li>
        <li><a href="{{url('students')}}"><i class="fa fa-university"></i> <span>Students</span></a></li>
        <li class="header"><h4><p class="fa fa-cogs"></p> General Settings</h4></li>
        <li><a href="{{url('users')}}"><i class="fa fa-users"></i> <span>User manager</span></a></li>
        @endcan<br>
        <li><a href="{{ route('logout') }}" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form2').submit();">
        <i class="fa fa-circle-o text-red"></i>
            <span>  {{ __('Logout') }} </span>
          </a>
          <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar-->
  </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="{{route('home')}}">ART Software</a>.</strong> All rights reserved.
  </footer>



</div>
<!-- ./wrapper -->


@include('/partials/footer')

</body>
@include('/includes/scripts')
</html>
