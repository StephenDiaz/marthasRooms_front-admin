<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Martha') }}</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet"></link>

  @yield('stylesheet')
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">MR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Martha's Rooms</span>
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
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile/{{Auth::user()->id}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                      Sign out
                   </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    Session::flush();
                  </form>
                 
                </div>
              </li>
            </ul>
          </li>        
          <!-- Control Sidebar Toggle Button -->
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
            @if(Auth::user()->image == null || Auth::user()->image == " ")
              <img src="{{asset('userImage/temporary.png')}}" class="img-circle" alt="User Image" style="width: 150px; height: 5%; border-radius: 50%">
            @else
                <img src="/userImage/{{Auth::user()->image}}"  class="img-circle" alt="user image" style="width: 150px; height: 5%; border-radius: 50%">
            @endif
         
        </div>
        <div class="pull-left info">
          <p>
            @if(Auth::user()->role == 'admin') 
              Admin

            @elseif(Auth::user()->role == 'frontDesk')

              Front Desk

            @endif

          </p>
          <!-- Status -->
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
      
          <li><a href="/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li>
            <a href = "{{url('guest')}}">
              <i class="fa fa-th-list"></i><span>Guest Information</span>
            </a>
          </li>
         
          @if(Auth::user()->role == 'frontDesk') 
             
              <li>
                <a href = "{{url('reservation')}}" >
                  <i class="fa fa-calendar-plus-o"></i> 
                  <span>Reservation</span>
                </a>
              </li> 
              <li>
                <a href = "{{url('confirmation')}}" >
                  <i class="fa fa-book"></i>
                  <span>Confirmed</span>
                  <span class="pull-right-container">
                  </span>
                </a>
              </li>
               <li>
                <a href = '/events'>
                  <i class="fa fa-calendar"></i> 
                  <span>Booking Calendar </span>
                </a>
              </li>
          @elseif(Auth::user()->role == 'admin')
              <li><a href="{{url('user')}}"><i class="fa fa-users"></i> <span>User Management</span></a></li>
              <li><a href="{{url('feedback')}}"><i class="fa fa-comments"></i> <span>Feedback</span></a></li>    
          @endif
         <li>
            <a href ="{{url('room')}}">
              <i class="fa fa-building"></i> <span>Rooms</span>
            </a>
          </li>
          
        
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    
    <!-- Default to the left -->
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script>. <a href="#">Martha</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->



    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('~/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

@yield('script')


@include('script.modalScript');


</body>
</html>