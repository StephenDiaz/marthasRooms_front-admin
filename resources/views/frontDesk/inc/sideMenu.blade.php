 
@if (Route::has('login'))
@auth       
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href = '/index'>
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
          </a>
        </li>  
        <li>
          <a href = "{{url('reservation')}}" >
            <i class="fa fa-calendar-plus-o"></i><span>Reservation</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href = "{{url('confirmation')}}" >
            <i class="fa fa-book"></i><span>Confirmed</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        
        <li>
          <a href ="{{url('room')}}">
            <i class="fa fa-building"></i> <span>Rooms</span>
          </a>
        </li>
        
        <li>
          <a href = '/calendar'>
            <i class="fa fa-calendar"></i> <span>Booking Calendar </span>
          </a>
        </li>
        <li>
          <a href = "{{url('guest')}}">
            <i class="fa fa-th-list"></i><span>Guest Information</span>
          </a>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@endauth
@endif